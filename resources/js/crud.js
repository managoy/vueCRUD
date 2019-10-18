import Vue from 'vue';
import axios from 'axios';


var crud = new Vue({
    el: '#crud',
    data() {
        return {
            name: '',
            email: '',
            address: '',
            students: [],
            preData:[],
        };
    },
    mounted() {
        this.showData();
    },
    methods: {
        showData: function (e) {
            let currentObj = this;
            axios.get('/student')
                .then(function (response) {
                    currentObj.students = response.data;

                })
                .catch(function (error) {
                    currentObj.output = error;
                });
        },
        postData: function (e) {
            e.preventDefault();
            let currentObj = this;
            axios.post('/student', {
                name: this.name,
                email: this.email,
                address: this.address
            })
                .then(function (response) {
                    currentObj.output = response.data;
                    currentObj.showData();
                    alert("Data Succesfully Inserted");
                })
                .catch(function (error) {
                    currentObj.output = error;
                });

        },
        deleteTuple: function (id) {

            let currentObj = this;
            axios.delete('student/'+id)
            .then(function (response) {
                currentObj.output = response.data;
                currentObj.showData();
                alert("Data Deleted");
            })
                .catch(function (error) {
                    currentObj.output = error;
                });
        },
        openModal: function(data){
            debugger;
            let currentObj = this;
            currentObj.preData = data;
            $('#exampleModal').modal('show');
        }
    }

})
