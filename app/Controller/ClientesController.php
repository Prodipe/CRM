<?php
	class ClientesController extends AppController {
		public $helpers = array('Html', 'Form');
		//Import controller
		//App::import('Controller', 'Atendimentos');
		//Atendimento = new AtendimentosController;
		
		public function index() {
			$this->set('clientes', $this->Cliente->find('all'));
		}
		
		public function ver($id = null) {
			if (!$id) {
				throw new NotFoundException(__('Inválido'));
			}
			
			$cliente = $this->Cliente->findById($id);
			
			if (!$cliente) {
				throw new NotFoundException(__('Inválido'));
			}
			
			$this->set('cliente', $cliente);
			
			// Array com os atendimentos de um determinado cliente
			$this->set('atendimentos', $this->Cliente->Atendimento->find('all', array('conditions' => array('Atendimento.cliente_id' => $id))));
		}
		
		public function adicionar() {
			// Array com o nome das empresas
			$this->set('empresa', $this->Cliente->Empresa->find('list', array('fields' => array('Empresa.nome'))));
			
			if ($this->request->is('post')) {
				$this->Cliente->create();
				if ($this->Cliente->save($this->request->data)) {
					$this->Session->setFlash('As informações foram adicionadas');
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash('As informações não foram adicionadas');
				}
			}
		}
		
		public function editar($id = null) {
			if (!$id) {
				throw new NotFoundException(__('Inválido'));
			}

			$cliente = $this->Cliente->findById($id);
			if (!$cliente) {
				throw new NotFoundException(__('Inválido'));
			}
			
			// Array com o nome das empresas
			$this->set('empresa', $this->Cliente->Empresa->find('list', array('fields' => array('Empresa.nome'))));
			
			if ($this->request->is('post') || $this->request->is('put')) {
				$this->Cliente->id = $id;
				if ($this->Cliente->save($this->request->data)) {
					$this->Session->setFlash('As informações foram atualizadas');
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash('As informações não foram atualizadas');
				}
			}

			if (!$this->request->data) {
				$this->request->data = $cliente;
			}
		}
		
		public function deletar($id) {
			if ($this->request->is('get')) {
				throw new MethodNotAllowedException();
			}
			
			$cliente = $this->Cliente->findById($id);
			
			if ($this->Cliente->delete($id)) {
				$this->Session->setFlash('O cliente: ' . $cliente['Cliente']['nome'] . ' foi deletado');
				$this->redirect(array('action' => 'index'));
			}
		}
		
		// Adicionar um atendimento para o cliente
		public function atendimentos($id = null) {
			if (!$id) {
				throw new NotFoundException(__('Inválido'));
			}

			$cliente = $this->Cliente->findById($id);
			
			if (!$cliente) {
				throw new NotFoundException(__('Inválido'));
			}
			
			//Atendimento->Emp;
			$this->set('cliente');
			//$this->render('');
		}
		
		public function voltar() {
				$this->redirect($this->referer());
		}
	}
?>