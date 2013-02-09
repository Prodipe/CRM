<?php
	class ClientesController extends AppController {
		public $helpers = array('Html', 'Form');
		
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
		}
		
		public function adicionar() {
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
			
			if ($this->cliente->delete($id)) {
				$this->Session->setFlash('O usuário: ' . $cliente['Cliente']['nome'] . ' foi deletado');
				$this->redirect(array('action' => 'index'));
			}
		}
	}
?>