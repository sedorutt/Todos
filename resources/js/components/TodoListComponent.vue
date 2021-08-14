<template>
  <div class="container">

    <div class="card">
      <p>Todo List</p>

      <div class="list-add justify-content-between">
        <input type="text" v-model="item.title" class="list-register">
        <button @click="add" class="add btn">追加</button>
      </div>
      <div class="list" >
        <form v-for="(todo, index) in todos" :key="index" class="justify-content-between">
          <input type="text" v-model="todo.title">
          <div class="todo-list">
            <button type="button" class="update btn" @click="edit(index)">更新</button>
            <button type="button" class="delete btn" @click="destroy(todo.id)">削除</button>
          </div>
        </form>
      </div>

    </div>

  </div>
</template>

<script>
export default {
  
  data(){
    return{
      item:{},
      todos:[],
    };
  },
  methods:{
    getTodos(){
      axios.get('/api/todos')
          .then(response => {
            this.todos = response.data;
          });
    },
    add(){
      axios.post('/api/todos' ,this.item)
          .then(response => {
            this.item ={};
            this.getTodos();
          });
    },
    edit(id){
      axios.put('/api/todos/'+id ,this.todos[id])
          .then(response => {
            console.log(this.todos[id]);
            this.getTodos();
          })

    },

    destroy(id){
      axios.delete('/api/todos/'+ id)
          .then(response => {
            this.getTodos();
          });
    }
    
  },
  mounted(){
    this.getTodos();
  }
}
</script>


<style scoped>
.container{
  background-color: #2d197c;
  height: 100vh;
  width: 100vw;
  position: relative;
}

.card{
  background-color: #fff;
  width: 50vw;
  padding: 30px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  border-radius: 10px;
}

.card p {
  font-weight: bold;
  font-size: 24px;
  line-height: 0;
}

.list-register {
  width: 80%;
  padding: 0.6rem;
}

.list-add {
  margin-bottom: 1rem;
}

.btn {
  text-align: left;
  font-size: 12px;
  background-color: #fff;
  font-weight: bold;
  padding: 8px 16px;
  border-radius: 5px;
  cursor: pointer;
  transition: 0.4s;
  outline: none;
}

.add{
  border: 2px solid #dc70fa;
  color: #dc70fa;
}
.update{
  border: 2px solid #fa9770;
  color: #fa9770;
}

.delete{
  border: 2px solid #71fadc;
  color: #71fadc;
}
form {
  margin: 8px 0;
}

.justify-content-between{
  display: flex;
  justify-content: space-between;
}
.justify-content-around{
  display: flex;
  justify-content: space-around;
}

input{
  border: 1px solid #ccc;
  border-radius: 5px;
  padding: 0.5rem ;
  font-size: 15px;
}

</style>