<template>
	<tbody>
		<course
			v-bind:course="course"
			v-bind:selected="selected"
			v-bind:student="student"
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
