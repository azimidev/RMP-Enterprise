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

			var selected = this.selected;

			eventBus.$on('selectedStudent', function (data) {
				if (data.status) {
					selected.push(data.id);
				} else {
					_.remove(selected, function (n) {
						return n === data.id;
					});
				}

			});
		},
		methods: {
			selectedStudent: function (student) {
				this.selected.push(student);
			},
		},
	};
</script>
