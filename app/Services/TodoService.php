<?php 
namespace App\Services;


use App\Reposirty\TodoRepositryInterface;

class TodoService{

    protected $TodoRepository;

    public function __construct(TodoRepositryInterface $todoRepository){
        $this->TodoRepository = $todoRepository;
    }

    public function addTask($task){
        $dataToSave=[
            'task'=>$task['task'],
            'status'=>0,
            'created_at'=>date('Y-m-d H:i:s')
        ];
        if($id = $this->TodoRepository->insert($dataToSave)){
            return ['code'=>200,'type'=>'add','message'=>'task addedd','id'=>$id];
        }
        return ['code'=>400,'error'=>'task not addedd'];
    }

    public function getList(){
        return $this->TodoRepository->getList();
    }

    public function deleteTask($id){
        if($this->TodoRepository->delete(['id'=>$id])){
            return ['code'=>200,'type'=>'delete','message'=>'Task deleted'];
        }
        return ['code'=>400,'error'=>'task not deleted'];
    }

    public function updateTaskAsCompleted($id){
        $condition =['id'=>$id];
        $dataToUpdate=['status'=>1];
        if($this->TodoRepository->update($condition,$dataToUpdate)){
            return ['code'=>200,'type'=>'updated','message'=>'Task Mark as Completed'];
        }
        return ['code'=>400,'error'=>'task not updated'];
    }
}