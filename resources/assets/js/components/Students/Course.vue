<template>
    <tr>
        <td>
            <input type="checkbox" v-model="picked" @click="select(student)">
        </td>
        <td style='text-align: left;'>{{student.firstname}}</td>
        <td style='text-align: left;'>{{student.surname}}</td>
        <td style='text-align: left;'>{{student.email}}</td>
        <td style='text-align: left;'>{{course.university}}</td>
        <td style='text-align: left;'>{{course.course_name}}</td>
    </tr>
</template>
<script>
    export default {
        props: ['student', 'course'],
        data() {
            return {
                picked: false,
            };
        },
        mounted() {
            eventBus.$on('toggleSelection', value => {
                this.picked = value;
                eventBus.$emit('selectedStudent', {
                    id: this.student.id,
                    status: value,
                });
            });
        },
        methods: {
            select(student) {
                eventBus.$emit('selectedStudent', {
                    id: student.id,
                    status: this.picked,
                });
            },
        },
    };
</script>
