<template>
    <div>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th></th>
                    <th>Forename</th>
                    <th>Surname</th>
                    <th>Email</th>
                    <th>University</th>
                    <th>Course</th>
                </tr>
            </thead>

            <student
                    v-if="students.length > 1"
                    v-for="student in students"
                    v-bind:student="student"
                    v-bind:selected="selected"
            >
            </student>

            <tr v-if="students.length < 1">
                <td colspan="6" style="text-align: center">Oh dear, no data found.</td>
            </tr>

        </table>

    </div>
</template>

<script>

    import StudentComponent from './Student.vue';

    export default{
        props: ['students','selected'],
        components:{
            'student':StudentComponent,
        }
    }

</script>
