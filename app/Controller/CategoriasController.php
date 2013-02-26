<?php
	class CategoriasController extends AppController {
		public $helpers = array('Html', 'Form');
		
		public function admin_index() {
			$this->set('categorias', $this->Categoria->find('all'));
		}
		
		public function admin_ver($id = null) {
			if (!$id) {
				$this->redirect(array('action' => 'index'));
				throw new NotFoundException(__('Inválido'));
			}
			
			$categoria = $this->Categoria->findById($id);
			
			if (!$categoria) {
				$this->redirect(array('action' => 'index'));
				throw new NotFoundException(__('Inválido'));
			}
			
			$this->set('categoria', $categoria);
		}
		
		public function admin_adicionar() {
			if ($this->request->is('post')) {
				$this->Categoria->create();
				if ($this->Categoria->save($this->request->data)) {
					$this->Session->setFlash(__('A categoria foi adicionada'), 'default', array('class' => 'alert alert-success'));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash('A categoria não foi adicionada', 'default', array('class' => 'alert alert-danger'));
				}
			}
		}
		
		public function admin_editar($id = null) {
			if (!$id) {
				$this->redirect(array('action' => 'index'));
				throw new NotFoundException(__('Inválido'));
			}

			$categoria = $this->Categoria->findById($id);
			
			if (!$categoria) {
				$this->redirect(array('action' => 'index'));
				throw new NotFoundException(__('Inválido'));
			}
			if ($this->request->is('post') || $this->request->is('put')) {
				$this->Categoria->id = $id;
				if ($this->Categoria->save($this->request->data)) {
					$this->Session->setFlash(__('As informações da categoria foram atualizadas'), 'default', array('class' => 'alert alert-success'));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash('As informações não foram atualizadas', 'default', array('class' => 'alert alert-danger'));
				}
			}
			if (!$this->request->data) {
				$this->request->data = $categoria;
			}
		}
		
		public function admin_deletar($id) {
			if ($this->request->is('get')) {
				throw new MethodNotAllowedException();
			}
			
			if ($this->Categoria->delete($id)) {
				$this->Session->setFlash(__('A categoria: ' . $id . ' foi deletada'), 'default', array('class' => 'alert alert-success'));
				$this->redirect(array('action' => 'index'));
			}
		}
		
		/*
		// Ordenar as categorias
		public function admin_ordenar($tipo) {
			if ($tipo == 'id') {
				$this->set('categorias', $this->Categoria->find('all', array('order' => array('Categoria.id' => 'ASC'))));
			}
			if ($tipo == 'descricao') {
				$this->set('categorias', $this->Categoria->find('all', array('order' => array('Categoria.descricao' => 'ASC'))));
			}
		}
		*/
	}
?>