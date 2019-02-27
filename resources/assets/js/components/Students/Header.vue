<template>
    <div>

        <div class="header">
            <div><img src="/images/logo_sm.jpg" alt="Logo" title="logo"></div>
            <div  style='margin: 10px;  text-align: left'>
                <input type="button" v-bind:value="selectText" v-on:click="toggleSelection()"/>
                <input type="button" value="Export Students" v-on:click="exportStudents()"/>
                <input type="button" value="Export Course Attendance" v-on:click="exportCourseAttendance()"/>
            </div>
        </div>

    </div>
</template>

<script>

    export default{
        props: ['selected'],
        data(){
            return{
                selectAll: true,
                message: 'not updated'
            }
        },
        methods: {
            toggleSelection: function () {

                eventBus.$emit('toggleSelection', this.selectAll);

                this.selectAll = !this.selectAll;

            },
            exportStudents: function(){
                var vue = this;

                if(this.selected.length>0){
                    swal({
                        title: "Export students",
                        text: "Are you sure you want to download the current selection?",
                        type: "info",
                        showCancelButton: true,
                        closeOnConfirm: false,
                        showLoaderOnConfirm: true,
                        cancelButtonText: 'No',
                        confirmButtonText: 'Yes'
                    },
                    function(){

                         var data = {
                            students: vue.selected,
                            all: false
                         };

                        vue.$http.post('./api/export/students', data).then((response) => {
                            swal.close();
                            window.location = response.body.file;
                        }, (response) => {
                            sweetAlert("Oops...", "We are terribly sorry, but there it was an error downloading your selection, please try again", "error");
                        });
                    });

                }else{
                    sweetAlert("Oops...", "You need to select some students in order to export them", "error");
                }
            },
            exportCourseAttendance: function(){

                var vue = this;

                swal({
                    title: "Export course attendance",
                    text: "Are you sure you want to download the current selection?",
                    type: "info",
                    showCancelButton: true,
                    closeOnConfirm: false,
                    showLoaderOnConfirm: true,
                    cancelButtonText: 'No',
                    confirmButtonText: 'Yes'
                },
                function(){
                    vue.$http.post('./api/export/course-attendance').then((response) => {
                        swal.close();
                        window.location = response.body.file;
                }, (response) => {
                sweetAlert("Oops...", "We are terribly sorry, but there it was an error downloading your selection, please try again", "error");
                });
                });
            }
        },
        computed: {
            selectText: function () {
                return this.selectAll ? 'Select all' : 'Unselect all'
            }
        }
    }
</script>
