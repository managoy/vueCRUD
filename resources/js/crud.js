import Vue from  'vue';
import axios from 'axios';



var crud = new Vue({
    el: '#crud',
    data(){
        return{
            name:'',
            email:'',
            address:'',
        };
    },
    methods:{
        showData: function(e){

            e.preventDefault();
            let currentObj =this;
            axios.get('/api/student')
                .then(function (response){
                    currentObj.output = response.data;
                    alert("Data taken");
                })
                .catch(function(error){
                    currentObj.output = error;
                });
        },
        postData: function(e){
            debugger;
            e.preventDefault();
            let currentObj = this;
            axios.post('/api/student',{
                name: this.name,
                email: this.email,
                address: this.address
            })
                .then(function (response){
                    currentObj.output = response.data;
                    alert("Data Succesfully Inserted");
                })
                .catch(function(error){
                    currentObj.output = error;
                });

        }
    }
})
