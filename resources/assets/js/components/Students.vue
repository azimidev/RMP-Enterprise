<template>
	<div>
		<header-component :selected="selected"/>
		<table-component :selected="selected" :students="students"/>
	</div>
</template>

<script>
	import HeaderComponent from '../components/students/Header.vue';
	import TableComponent from '../components/students/Table.vue';

	export default {
		data() {
			return {
				students: students,
				selected: [],
			};
		},
		components: {
			'header-component': HeaderComponent,
			'table-component': TableComponent,
		},
		mounted() {

			eventBus.$on('selectedStudent', (data) => {
				if (data.status) {
					this.selected.push(data.id);
				} else {
					_.remove(this.selected, n => n === data.id);
				}

			});
		},
		methods: {
			selectedStudent(student) {
				this.selected.push(student);
			},
		},
	};
</script>
