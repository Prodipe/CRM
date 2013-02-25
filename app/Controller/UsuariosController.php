<?php
	class UsuariosController extends AppController {
		public $helpers = array('Html', 'Form');
		public $name = 'Usuarios';
        public $uses = array('Usuario');
		
		// Paginação
		public $paginate = array(
			'limit' => 20,
			'order' => array('Usuario.nome' => 'asc')
		);
		
		// Override da função beforeFilter do AppController
		public function beforeFilter() {
			parent::beforeFilter();
		}
		
		public function admin_index() {
			// Somente os usuários comuns com nível de acesso igual a 0
			$this->paginate['Usuario']['conditions'] = array('Usuario.nivel_acesso' => 0);
			$this->set('usuarios', $this->paginate());
			
			//$this->set('usuarios', $this->Usuario->find('all', array('conditions' => array('Usuario.nivel_acesso' => 0))));
		}
		
		public function index() {
			//$this->set('usuarios', $this->Usuario->find('all'));
		}
		
		public function admin_ver($id = null) {
			if (!$id) {
				throw new NotFoundException(__('Inválido'));
			}
			
			$usuario = $this->Usuario->findById($id);
			
			if (!$usuario) {
				throw new NotFoundException(__('Inválido'));
			}
			
			$this->set('usuario', $usuario);
			
			// Array com os atendimentos de um determinado usuário
			$this->set('atendimentos', $this->Usuario->Atendimento->find('all', array('conditions' => array('Atendimento.usuario_id' => $id))));
			
			//$atend = $this->Usuario->Atendimento->find('all', array('conditions' => array('Atendimento.usuario_id' => $id)));
			//$this->paginate['conditions'] = $atend;
			//$this->set('atendimentos', $this->paginate());
		}
		
		public function admin_adicionar() {
			// Array com o nome das empresas
			$this->set('empresa', $this->Usuario->Empresa->find('list', array('fields' => array('Empresa.nome'))));
		
			if ($this->request->is('post')) {
				$this->Usuario->create();
				if ($this->Usuario->save($this->request->data)) {
					$this->Session->setFlash(__('Usuário cadastrado com sucesso!'), 'default', array('class' => 'success'));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash('Erro durante o cadastro de usuário!');
				}
			}
		}
		
		public function admin_editar($id = null) {
			if (!$id) {
				$this->redirect(array('action' => 'index'));
				throw new NotFoundException(__('Inválido'));
			}
			$usuario = $this->Usuario->findById($id);
			if (!$usuario) {
				$this->redirect(array('action' => 'index'));
				throw new NotFoundException(__('Inválido'));
			}
			// Verifica se o usuário não é administrador
			// Um administrador só pode editar informações de usuários comuns ou de si próprio
			if ($usuario['Usuario']['nivel_acesso'] != 1) {
				// Array com o nome das empresas
				$this->set('empresa', $this->Usuario->Empresa->find('list', array('fields' => array('Empresa.nome'))));
				$this->set('usuario', $usuario);
				
				if ($this->request->is('post') || $this->request->is('put')) {
					$this->Usuario->id = $id;
					if ($this->Usuario->save($this->request->data)) {
						$this->Session->setFlash(__('As informações do usuário foram atualizadas'), 'default', array('class' => 'success'));
						$this->redirect(array('action' => 'index'));
					} else {
						$this->Session->setFlash('As informações não foram atualizadas');
					}
				}
				if (!$this->request->data) {
					$this->request->data = $usuario;
				}
			}
			// Verifica se o usuário é o mesmo que está logado
			// O usuário só pode editar informações referentes a si próprio
			else if ($id == $this->Auth->user('id')) {
				$this->set('empresa', $this->Usuario->Empresa->find('list', array('fields' => array('Empresa.nome'))));
				$this->set('usuario', $usuario);
				
				if ($this->request->is('post') || $this->request->is('put')) {
					$this->Usuario->id = $id;
					if ($this->Usuario->save($this->request->data)) {
						$this->Session->setFlash(__('As informações do usuário foram atualizadas'), 'default', array('class' => 'success'));
						$this->redirect(array('action' => 'index'));
					} else {
						$this->Session->setFlash('As informações não foram atualizadas');
					}
				}
				if (!$this->request->data) {
					$this->request->data = $usuario;
				}
			}
			else {
				$this->Session->setFlash('Você não tem permissão!');
				$this->redirect(array('action' => 'index'));
			}
		}
		
		public function editar($id = null) {
			if (!$id) {
				throw new NotFoundException(__('Inválido'));
			}
			$usuario = $this->Usuario->findById($id);
			if (!$usuario) {
				throw new NotFoundException(__('Inválido'));
			}
			// Verifica se o usuário é o mesmo que está logado
			// O usuário só pode editar informações referentes a si próprio
			if ($id == $this->Auth->user('id')) {
				// Array com o nome das empresas
				$this->set('empresa', $this->Usuario->Empresa->find('list', array('fields' => array('Empresa.nome'))));
				
				if ($this->request->is('post') || $this->request->is('put')) {
					$this->Usuario->id = $id;
					if ($this->Usuario->save($this->request->data)) {
						$this->Session->setFlash(__('As informações do usuário foram atualizadas'), 'default', array('class' => 'success'));
						$this->redirect(array('action' => 'index'));
					} else {
						$this->Session->setFlash('As informações não foram atualizadas');
					}
				}
				if (!$this->request->data) {
					$this->request->data = $usuario;
				}
			}
			else {
				$this->Session->setFlash('Você não tem permissão!');
				$this->redirect(array('action' => 'index'));
			}
		}
		
		public function admin_deletar($id) {
			if ($this->request->is('get')) {
				throw new MethodNotAllowedException();
			}
			
			$usuario = $this->Usuario->findById($id);
			
			if ($this->Usuario->delete($id)) {
				$this->Session->setFlash(__('O usuário: ' . $usuario['Usuario']['nome'] . ' foi deletado'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			}
		}
		
		// Ordenar os usuários
		public function admin_ordenar($tipo) {
			if ($tipo == 'nome') {
				$this->set('usuarios', $this->Usuario->find('all', array('order' => array('Usuario.nome' => 'ASC'))));
			}
			if ($tipo == 'login') {
				$this->set('usuarios', $this->Usuario->find('all', array('order' => array('Usuario.login' => 'ASC'))));
			}
			if ($tipo == 'matricula') {
				$this->set('usuarios', $this->Usuario->find('all', array('order' => array('Usuario.matricula' => 'ASC'))));
			}
			if ($tipo == 'status') {
				$this->set('usuarios', $this->Usuario->find('all', array('order' => array('Usuario.status' => 'ASC'))));
			}
		}
		
		public function mudar_senha() {
			$id = $this->Auth->user('id');
			$usuario = $this->Usuario->findById($id);
			if (!$usuario) {
				$this->redirect(array('action' => 'index'));
				throw new NotFoundException(__('Inválido'));
			}
			if ($this->request->is('post') || $this->request->is('put')) {
				$this->Usuario->id = $id;
				if ($this->Usuario->save($this->request->data)) {
					$this->Session->setFlash(__('As informações do usuário foram atualizadas'), 'default', array('class' => 'success'));
					/*if ($this->Auth->user('nivel_acesso' != 1)) {
						$this->redirect(array('action' => 'index'));
					}
					else {
						$this->redirect(array('admin' => true, 'action' => 'index'));
					}*/
				} else {
					$this->Session->setFlash('As informações não foram atualizadas');
				}
			}
			if (!$this->request->data) {
				$this->request->data = $usuario;
			}
		}
		
		/* Área de login */
		public function login() {
			$this->set('title_for_layout', __('Log in'));
			if ($this->request->is('post')) {
				if ($this->Auth->login()) {
					if ($this->Auth->user('nivel_acesso')) {
						return $this->redirect(array(
							'admin' => true,
                            'controller' => 'usuarios',
                            'action' => 'index'
                        ));
					}
					else {
						return $this->redirect(array(
                            'controller' => 'usuarios',
                            'action' => 'index'
                        ));
					}
					//return $this->redirect($this->Auth->redirect());
				} else {
					$this->Session->setFlash('Nome de usúario ou senha não conferem!', 'default', array('class' => 'alert alert-danger'));
					//$this->Session->setFlash($this->Auth->loginError);
					//$this->redirect($this->Auth->loginAction);
				}
			}
		}

		public function logout() {
			$this->Session->setFlash(__('Deslogado com sucesso!'), 'default', array('class' => 'alert alert-success'));
			$this->redirect($this->Auth->logout());
		}
		/* Fim */
	}
?>