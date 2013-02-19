<?php
	class UsuariosController extends AppController {
		public $helpers = array('Html', 'Form');
		public $name = 'Usuarios';
        public $uses = array('Usuario');

		// Override da função beforeFilter do AppController
		public function beforeFilter() {
			parent::beforeFilter();                     
		}
		
		public function index() {
			$this->set('usuarios', $this->Usuario->find('all'));
		}
		
		public function ver($id = null) {
			if (!$id) {
				throw new NotFoundException(__('Inválido'));
			}
			
			$usuario = $this->Usuario->findById($id);
			
			if (!$usuario) {
				throw new NotFoundException(__('Inválido'));
			}
			
			$this->set('usuario', $usuario);
		}
		
		public function adicionar() {
			// Array com o nome das empresas
			$this->set('empresa', $this->Usuario->Empresa->find('list', array('fields' => array('Empresa.nome'))));
		
			if ($this->request->is('post')) {
				$this->Usuario->create();
				if ($this->Usuario->save($this->request->data)) {
					$this->Session->setFlash(__('Usuário cadastrado com sucesso!'), 'default', array('class' => 'success'));
					$this->redirect(array('action' => 'login'));
				} else {
					$this->Session->setFlash('Erro durante o cadastro de usuário!');
				}
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
		
		public function deletar($id) {
			if ($this->request->is('get')) {
				throw new MethodNotAllowedException();
			}
			
			$usuario = $this->Usuario->findById($id);
			
			if ($this->Usuario->delete($id)) {
				$this->Session->setFlash(__('O usuário: ' . $usuario['Usuario']['nome'] . ' foi deletado'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			}
		}
		
		/* Área de login */
		
		public function login() {
			$this->set('title_for_layout', __('Log in'));
			if ($this->request->is('post')) {
				if ($this->Auth->login()) {
					return $this->redirect($this->Auth->redirect());
				} else {
					$this->Session->setFlash($this->Auth->loginError);
					$this->redirect($this->Auth->loginAction);
				}
			}
		}

		public function logout() {
			$this->Session->setFlash(__('Deslogado com sucesso!'), 'default', array('class' => 'success'));
			$this->redirect($this->Auth->logout());
		}
	}
?>