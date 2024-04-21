<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Complaints Controller
 *
 * @property \App\Model\Table\ComplaintsTable $Complaints
 */
class ComplaintsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Complaints->find()
            ->contain(['Users']);
        $complaints = $this->paginate($query);

        $this->set(compact('complaints'));
    }

    /**
     * View method
     *
     * @param string|null $id Complaint id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $complaint = $this->Complaints->get($id, contain: ['Users', 'Responses']);
        $this->set(compact('complaint'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $complaint = $this->Complaints->newEmptyEntity();
        if ($this->request->is('post')) {
            $files = $this->request->getUploadedFiles();
            $files['gambar']->getStream();
            $files['gambar']->getSize();
            $files['gambar']->getClientFileName();

            $name = $this->request->getData()['gambar']->getClientFileName();
            $eks = substr(strchr($name, "."), 1);

            $path = "upload/".$name.".".$eks;
            $complaint = $this->Complaints->patchEntity($complaint, $this->request->getData());
            $complaint->gambar = $name.".".$eks;

            $files['gambar']->moveTo(WWW_ROOT.$path);

            if ($this->Complaints->save($complaint)) {
                $this->Flash->success(__('The complaint has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The complaint could not be saved. Please, try again.'));
        }
        $users = $this->Complaints->Users->find('list', limit: 200)->all();
        $this->set(compact('complaint', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Complaint id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $complaint = $this->Complaints->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $complaint = $this->Complaints->patchEntity($complaint, $this->request->getData());
            if ($this->Complaints->save($complaint)) {
                $this->Flash->success(__('The complaint has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The complaint could not be saved. Please, try again.'));
        }
        $users = $this->Complaints->Users->find('list', limit: 200)->all();
        $this->set(compact('complaint', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Complaint id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $complaint = $this->Complaints->get($id);
        if ($this->Complaints->delete($complaint)) {
            $this->Flash->success(__('The complaint has been deleted.'));
        } else {
            $this->Flash->error(__('The complaint could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
