<?php
	class ParametrosController extends AppController {
		public $helpers = array('Html', 'Form');
		
		public function admin_index() {
			$this->set('parametros', $this->Parametro->find('all'));
		}
		
		public function admin_ver($id = null) {
			if (!$id) {
				$this->redirect(array('action' => 'index'));
				throw new NotFoundException(__('Inválido'));
			}
			
			$parametro = $this->Parametro->findById($id);
			
			if (!$parametro) {
				$this->redirect(array('action' => 'index'));
				throw new NotFoundException(__('Inválido'));
			}
			
			$this->set('parametro', $parametro);
		}
		
		public function admin_adicionar() {
			// Array com o nome das empresas
			$this->set('empresa', $this->Parametro->Empresa->find('list', array('fields' => array('Empresa.nome'))));
			
			if ($this->request->is('post')) {
				$this->Parametro->create();
				if ($this->Parametro->save($this->request->data)) {
					$this->Session->setFlash(__('O parâmetro foi adicionado'), 'default', array('class' => 'alert alert-success'));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash('O parâmetro não foi adicionado', 'default', array('class' => 'alert alert-danger'));
				}
			}
		}
		
		public function admin_editar($id = null) {
			if (!$id) {
				$this->redirect(array('action' => 'index'));
				throw new NotFoundException(__('Inválido'));
			}

			$parametro = $this->Parametro->findById($id);
			if (!$parametro) {
				$this->redirect(array('action' => 'index'));
				throw new NotFoundException(__('Inválido'));
			}
			
			// Array com o nome das empresas
			$this->set('empresa', $this->Parametro->Empresa->find('list', array('fields' => array('Empresa.nome'))));
			
			if ($this->request->is('post') || $this->request->is('put')) {
				$this->Parametro->id = $id;
				if ($this->Parametro->save($this->request->data)) {
					$this->Session->setFlash(__('As informações do parâmetro foram atualizadas'), 'default', array('class' => 'alert alert-success'));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash('As informações não foram atualizadas', 'default', array('class' => 'alert alert-danger'));
				}
			}

			if (!$this->request->data) {
				$this->request->data = $parametro;
			}
		}
		
		public function admin_deletar($id) {
			if ($this->request->is('get')) {
				throw new MethodNotAllowedException();
			}
			
			//$parametro = $this->Parametro->findById($id);
			
			if ($this->Parametro->delete($id)) {
				$this->Session->setFlash(__('O parâmetro: ' . $id . ' foi deletado'), 'default', array('class' => 'alert alert-success'));
				$this->redirect(array('action' => 'index'));
			}
		}
		
		/*
		// Ordenar os parâmetros
		public function admin_ordenar($tipo) {
			if ($tipo == 'id') {
				$this->set('parametros', $this->Parametro->find('all', array('order' => array('Parametro.id' => 'ASC'))));
			}
			if ($tipo == 'descricao') {
				$this->set('parametros', $this->Parametro->find('all', array('order' => array('Parametro.descricao' => 'ASC'))));
			}
			if ($tipo == 'valor') {
				$this->set('parametros', $this->Parametro->find('all', array('order' => array('Parametro.valor' => 'ASC'))));
			}
		}
		*/
	}
?>