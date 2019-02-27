<template>
    <tbody>
        <course
                v-for="course in student.courses"
                v-bind:student="student"
                v-bind:course="course"
                v-bind:selected="selected"
        >
        </course>
    </tbody>
</template>

<script>

    import CourseComponent from './Course.vue'

    export default{
        props: ['student'],
        components:{
            'course':CourseComponent,
        }
    }
</script>
