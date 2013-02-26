<?php
	class AtendimentosController extends AppController {
		public $helpers = array('Html', 'Form');
		public $components = array('Search.Prg');
		
		// Utiliza os critérios de busca definidos no model
		public $presetVars = true;
		
		// Paginação
		public $paginate = array(
			'limit' => 20,
			'order' => array('Atendimento.id' => 'asc')
		);
		
		public function index() {
			//$this->set('atendimentos', $this->Atendimento->find('all'));
			
			$this->Prg->commonProcess();
			$this->paginate['conditions'] = $this->Atendimento->parseCriteria($this->passedArgs);
			$this->set('atendimentos', $this->paginate());
			$this->set('categorias', $this->Atendimento->Categoria->find('list', array('fields' => array('Categoria.descricao'))));
		}
		
		public function ver($id = null) {
			if (!$id) {
				$this->redirect(array('action' => 'index'));
				throw new NotFoundException(__('Inválido'));
			}
			
			$atendimento = $this->Atendimento->findById($id);
			
			if (!$atendimento) {
				$this->redirect(array('action' => 'index'));
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
					$this->Session->setFlash(__('O atendimento foi adicionado'), 'default', array('class' => 'alert alert-success'));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash('O atendimento não foi adicionado', 'default', array('class' => 'alert alert-danger'));
				}
			}
		}
		
		public function editar($id = null) {
			if (!$id) {
				$this->redirect(array('action' => 'index'));
				throw new NotFoundException(__('Inválido'));
			}

			$atendimento = $this->Atendimento->findById($id);
			if (!$atendimento) {
				$this->redirect(array('action' => 'index'));
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
					$this->Session->setFlash(__('As informações do atendimento foram atualizadas'), 'default', array('class' => 'alert alert-success'));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash('As informações não foram atualizadas', 'default', array('class' => 'alert alert-danger'));
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
				$this->Session->setFlash(__('O atendimento: ' . $id . ' foi deletado'), 'default', array('class' => 'alert alert-success'));
				$this->redirect(array('action' => 'index'));
			}
		}
		
		/*
		// Ordenar os atendimentos
		public function ordenar($tipo) {
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
		}
		*/
		
		/*
		// Adicionar um atendimento para o cliente
		public function clientes($id = null) {
			if (!$id) {
				throw new NotFoundException(__('Inválido'));
			}
			
			$cliente = $this->Atendimento->Cliente->findById($id);
			
			if (!$cliente) {
				throw new NotFoundException(__('Inválido'));
			}
			
			$this->Atendimento->cliente_id = $id;
			
			$this->set('empresa', $this->Atendimento->Empresa->find('list', array('fields' => array('Empresa.nome'))));
			$this->set('usuario', $this->Atendimento->Usuario->find('list', array('fields' => array('Usuario.nome'))));
			$this->set('categoria', $this->Atendimento->Categoria->find('list', array('fields' => array('Categoria.descricao'))));
			
			if ($this->request->is('post')) {
				$this->Atendimento->create();
				if ($this->Atendimento->save($this->request->data)) {
					$this->Session->setFlash('As informações foram adicionadas');
					$this->redirect(array('controller' => 'clientes', 'action' => 'ver', $id));
				} else {
					$this->Session->setFlash('As informações não foram adicionadas');
				}
			}
		}
		*/
	}
?>