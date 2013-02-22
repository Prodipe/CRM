<?php
	class UsuariosController extends AppController {
		public $helpers = array('Html', 'Form');
		public $name = 'Usuarios';
        public $uses = array('Usuario');

		// Override da função beforeFilter do AppController
		public function beforeFilter() {
			parent::beforeFilter();
		}
		
		public function admin_index() {
			$this->set('usuarios', $this->Usuario->find('all'));
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
				throw new NotFoundException(__('Inválido'));
			}
			$usuario = $this->Usuario->findById($id);
			if (!$usuario) {
				throw new NotFoundException(__('Inválido'));
			}
			
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
		
		public function editar($id = null) {
			if (!$id) {
				throw new NotFoundException(__('Inválido'));
			}
			$usuario = $this->Usuario->findById($id);
			if (!$usuario) {
				throw new NotFoundException(__('Inválido'));
			}
			//if (($usuario['Usuario']['nivel_acesso'] != 1) && ($usuario['Usuario']['id'] == $id)) {
				//$this->set('usuario', $usuario);
				
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
			//}
			//else {
				//$this->Session->setFlash('Sem permissão');
				//$this->redirect(array('action' => 'index'));
			//}
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