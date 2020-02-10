<template>
	<tbody>
		<course
			:course="course"
			:key="course.id"
			v-for="course in student.courses"
			:student="student"
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
