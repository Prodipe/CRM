<?php
	class AtendimentosController extends AppController {
		public $helpers = array('Html', 'Form');
		
		public function index() {
			$this->set('atendimentos', $this->Atendimento->find('all'));
		}
		
		public function ver($id = null) {
			if (!$id) {
				throw new NotFoundException(__('Inválido'));
			}
			
			$atendimento = $this->Atendimento->findById($id);
			
			if (!$atendimento) {
				throw new NotFoundException(__('Inválido'));
			}
			
			$this->set('atendimento', $atendimento);
		}
		
		public function adicionar() {
			// Arrays com os nomes
			$this->set('empresa', $this->Atendimento->Empresa->find('list', array('fields' => array('Empresa.nome'))));
			$this->set('usuario', $this->Atendimento->Usuario->find('list', array('fields' => array('Usuario.nome'))));
			$this->set('cliente', $this->Atendimento->Cliente->find('list', array('fields' => array('Cliente.nome'))));
			$this->set('categoria', $this->Atendimento->Categoria->find('list', array('fields' => array('Categoria.descricao'))));
		
			if ($this->request->is('post')) {
				$this->Atendimento->create();
				if ($this->Atendimento->save($this->request->data)) {
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

			$atendimento = $this->Atendimento->findById($id);
			if (!$atendimento) {
				throw new NotFoundException(__('Inválido'));
			}
			
			// Arrays com os nomes
			$this->set('empresa', $this->Atendimento->Empresa->find('list', array('fields' => array('Empresa.nome'))));
			$this->set('usuario', $this->Atendimento->Usuario->find('list', array('fields' => array('Usuario.nome'))));
			$this->set('cliente', $this->Atendimento->Cliente->find('list', array('fields' => array('Cliente.nome'))));
			$this->set('categoria', $this->Atendimento->Categoria->find('list', array('fields' => array('Categoria.descricao'))));
			
			if ($this->request->is('post') || $this->request->is('put')) {
				$this->Atendimento->id = $id;
				if ($this->Atendimento->save($this->request->data)) {
					$this->Session->setFlash('As informações foram atualizadas');
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash('As informações não foram atualizadas');
				}
			}

			if (!$this->request->data) {
				$this->request->data = $atendimento;
			}
		}
		
		public function deletar($id) {
			if ($this->request->is('get')) {
				throw new MethodNotAllowedException();
			}
			
			if ($this->Atendimento->delete($id)) {
				$this->Session->setFlash('O atendimento: ' . $id . ' foi deletado');
				$this->redirect(array('action' => 'index'));
			}
		}
	}
?>