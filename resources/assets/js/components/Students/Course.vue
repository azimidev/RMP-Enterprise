<template>
    <tr>
        <td>
            <input type="checkbox" v-model="picked" v-on:click="select(student)">
        </td>
        <td style=' text-align: left;'>{{student.firstname}}</td>
        <td style=' text-align: left;'>{{student.surname}}</td>
        <td style=' text-align: left;'>{{student.email}}</td>
        <td style=' text-align: left;'>{{course.university}}</td>
        <td style=' text-align: left;'>{{course.course_name}}</td>
    </tr>
</template>

<script>

    export default {
        props: ['student', 'course', 'selected'],
        data() {
            return {
                picked: false,
            };
        },
        mounted() {

            var vue = this;

            eventBus.$on('toggleSelection', function (value) {
                vue.picked = value;
                eventBus.$emit('selectedStudent', {
                    id: vue.student.id,
                    status: value,
                });
            });
        },
        methods: {
            select: function (student) {
                eventBus.$emit('selectedStudent', {
                    id: student.id,
                    status: this.picked,
                });
            },
        },
    };
</script>
