﻿<?php
	class EmpresasController extends AppController {
		public $helpers = array('Html', 'Form');

		public function admin_index() {
			$this->set('empresas', $this->Empresa->find('all'));
		}
		
		public function admin_ver($id = null) {
			if (!$id) {
				throw new NotFoundException(__('Inválido'));
			}
			
			$empresa = $this->Empresa->findById($id);
			
			if (!$empresa) {
				throw new NotFoundException(__('Inválido'));
			}
			
			$this->set('empresa', $empresa);
		}
		
		public function admin_adicionar() {
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
		
		public function admin_editar($id = null) {
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
		
		public function admin_deletar($id) {
			if ($this->request->is('get')) {
				throw new MethodNotAllowedException();
			}
			
			$empresa = $this->Empresa->findById($id);
			
			if ($this->Empresa->delete($id)) {
				$this->Session->setFlash(__('A empresa: ' . $empresa['Empresa']['nome'] . ' foi deletada'), 'default', array('class' => 'success'));
				$this->redirect(array('action' => 'index'));
			}
		}
		
		// Ordenar as empresas
		public function admin_ordenar($tipo) {
			if ($tipo == 'nome') {
				$this->set('empresas', $this->Empresa->find('all', array('order' => array('Empresa.nome' => 'ASC'))));
			}
			if ($tipo == 'razao') {
				$this->set('empresas', $this->Empresa->find('all', array('order' => array('Empresa.razao_social' => 'ASC'))));
			}
		}
	}
?>