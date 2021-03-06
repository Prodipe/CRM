﻿<?php
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
			
			// Array com os atendimentos de um determinado cliente
			$this->set('atendimentos', $this->Cliente->Atendimento->find('all', array('conditions' => array('Atendimento.cliente_id' => $id))));
		}
		
		public function adicionar() {
			// Array com o nome das empresas
			$this->set('empresa', $this->Cliente->Empresa->find('list', array('fields' => array('Empresa.nome'))));
			
			if ($this->request->is('post')) {
				$this->Cliente->create();
				if ($this->Cliente->save($this->request->data)) {
					$this->Session->setFlash(__('O cliente foi adicionado'), 'default', array('class' => 'success'));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash('Nenhum cliente foi adicionado');
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
					$this->Session->setFlash(__('As informações do cliente foram atualizadas'), 'default', array('class' => 'success'));
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
				$this->Session->setFlash(__('O cliente: ' . $cliente['Cliente']['nome'] . ' foi deletado'), 'default', array('class' => 'success'));
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
			
			//$this->Cliente->Atendimento->cliente_id = $id;
			$this->set('empresa', $this->Cliente->Atendimento->Empresa->find('list', array('fields' => array('Empresa.nome'))));
			$this->set('usuario', $this->Cliente->Atendimento->Usuario->find('list', array('fields' => array('Usuario.nome'))));
			$this->set('categoria', $this->Cliente->Atendimento->Categoria->find('list', array('fields' => array('Categoria.descricao'))));
			$this->set('cliente', $cliente);
			
			if ($this->request->is('post')) {
				$this->Cliente->Atendimento->create();
				if ($this->Cliente->Atendimento->save($this->request->data)) {
					$this->Session->setFlash(__('O atendimento do cliente foi adicionado'), 'default', array('class' => 'success'));
					$this->redirect(array('action' => 'ver', $id));
				} else {
					$this->Session->setFlash('O atendimento do cliente não foi adicionado');
				}
			}
		}
		
		// Ordenar os clientes
		public function ordenar($tipo) {
			if ($tipo == 'nome') {
				$this->set('clientes', $this->Cliente->find('all', array('order' => array('Cliente.nome' => 'ASC'))));
			}
			if ($tipo == 'matricula') {
				$this->set('clientes', $this->Cliente->find('all', array('order' => array('Cliente.matricula' => 'ASC'))));
			}
			if ($tipo == 'data_cadastro') {
				$this->set('clientes', $this->Cliente->find('all', array('order' => array('Cliente.data_cadastro' => 'DESC'))));
			}
			if ($tipo == 'status') {
				$this->set('clientes', $this->Cliente->find('all', array('order' => array('Cliente.status' => 'ASC'))));
			}
			if ($tipo == 'email') {
				$this->set('clientes', $this->Cliente->find('all', array('order' => array('Cliente.email' => 'ASC'))));
			}
			if ($tipo == 'telefone1') {
				$this->set('clientes', $this->Cliente->find('all', array('order' => array('Cliente.telefone1' => 'ASC'))));
			}
		}
		
		/*
		// Ordenar os atendimentos do cliente
		public function ordenar_atendimentos($tipo) {
			if ($tipo == 'id') {
				$this->set('atendimentos', $this->Atendimento->find('all', array('order' => array('Atendimento.id' => 'ASC'))));
			}
			if ($tipo == 'protocolo') {
				$this->set('atendimentos', $this->Atendimento->find('all', array('order' => array('Atendimento.protocolo' => 'ASC'))));
			}
			if ($tipo == 'data') {
				$this->set('atendimentos', $this->Atendimento->find('all', array('order' => array('Atendimento.data_hora' => 'DESC'))));
			}
			if ($tipo == 'status') {
				$this->set('atendimentos', $this->Atendimento->find('all', array('order' => array('Atendimento.status' => 'ASC'))));
			}
			if ($tipo == 'prioridade') {
				$this->set('atendimentos', $this->Atendimento->find('all', array('order' => array('Atendimento.prioridade' => 'ASC'))));
			}
			if ($tipo == 'nota') {
				$this->set('atendimentos', $this->Atendimento->find('all', array('order' => array('Atendimento.nota' => 'ASC'))));
			}
		}*/
	}
?>