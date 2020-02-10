<template>
	<tbody>
		<course
			:course="course"
			:key="course.id"
			:student="student"
			v-for="course in student.courses"
		>
		</course>
	</tbody>
</template>
<script>
	import CourseComponent from './Course.vue';

	export default {
		props: ['student'],
		components: {
			'course': CourseComponent,
		},
	};
</script>
