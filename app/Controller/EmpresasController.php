<?php
	class EmpresasController extends AppController {
		public $helpers = array('Html', 'Form');

		public function index() {
			$this->set('empresas', $this->Empresa->find('all'));
		}
		
		public function ver($id = null) {
			if (!$id) {
				throw new NotFoundException(__('Inválido'));
			}
			
			$empresa = $this->Empresa->findById($id);
			
			if (!$empresa) {
				throw new NotFoundException(__('Inválido'));
			}
			
			$this->set('empresa', $empresa);
		}
		
		public function adicionar() {
			if ($this->request->is('post')) {
				$this->Empresa->create();
				if ($this->Empresa->save($this->request->data)) {
					$this->Session->setFlash(__('A empresa foi adicionada'), 'default', array('class' => 'success'));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash('Nenhuma empresa foi adicionada');
				}
			}
		}
		
		public function editar($id = null) {
			if (!$id) {
				throw new NotFoundException(__('Inválido'));
			}

			$empresa = $this->Empresa->findById($id);
			if (!$empresa) {
				throw new NotFoundException(__('Inválido'));
			}

			if ($this->request->is('post') || $this->request->is('put')) {
				$this->Empresa->id = $id;
				if ($this->Empresa->save($this->request->data)) {
					$this->Session->setFlash(__('As informações foram atualizadas'), 'default', array('class' => 'success'));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash('As informações não foram atualizadas');
				}
			}

			if (!$this->request->data) {
				$this->request->data = $empresa;
			}
		}
		
		public function deletar($id) {
			if ($this->request->is('get')) {
				throw new MethodNotAllowedException();
			}
			
			$empresa = $this->Empresa->findById($id);
			
			if ($this->Empresa->delete($id)) {
				$this->Session->setFlash(__('A empresa: ' . $empresa['Empresa']['nome'] . ' foi deletada'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			}
		}
	}
?>