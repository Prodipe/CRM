<?php
	class ParametrosController extends AppController {
		public $helpers = array('Html', 'Form');
		
		public function index() {
			$this->set('parametros', $this->Parametro->find('all'));
		}
		
		public function ver($id = null) {
			if (!$id) {
				throw new NotFoundException(__('Inválido'));
			}
			
			$parametro = $this->Parametro->findById($id);
			
			if (!$parametro) {
				throw new NotFoundException(__('Inválido'));
			}
			
			$this->set('parametro', $parametro);
		}
		
		public function adicionar() {
			$this->set('empresa', $this->Parametro->Empresa->find('list', array('fields' => array('Empresa.nome'))));
			
			if ($this->request->is('post')) {
				$this->Parametro->create();
				if ($this->Parametro->save($this->request->data)) {
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

			$parametro = $this->Parametro->findById($id);
			if (!$parametro) {
				throw new NotFoundException(__('Inválido'));
			}

			$this->set('empresa', $this->Parametro->Empresa->find('list', array('fields' => array('Empresa.nome'))));
			
			if ($this->request->is('post') || $this->request->is('put')) {
				$this->Parametro->id = $id;
				if ($this->Parametro->save($this->request->data)) {
					$this->Session->setFlash('As informações foram atualizadas');
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash('As informações não foram atualizadas');
				}
			}

			if (!$this->request->data) {
				$this->request->data = $parametro;
			}
		}
		
		public function deletar($id) {
			if ($this->request->is('get')) {
				throw new MethodNotAllowedException();
			}
			
			//$parametro = $this->Parametro->findById($id);
			
			if ($this->parametro->delete($id)) {
				$this->Session->setFlash('O parâmetro: ' . $id . ' foi deletado');
				$this->redirect(array('action' => 'index'));
			}
		}
	}
?>