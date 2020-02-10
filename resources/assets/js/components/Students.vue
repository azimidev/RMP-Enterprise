<template>
	<div>
		<header-component :selected="selected"/>
		<div class="row" style="margin-top: 10px;">
			<div class="col-md-6 col-md-offset-3">
				<input placeholder="Search student name, surname or email..."
				       type="search"
				       class="form-control"
				       v-model="search"/>
			</div>
		</div>
		<table-component :selected="selected" :students="filteredStudent"/>
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
				search: '',
			};
		},
		components: {
			'header-component': HeaderComponent,
			'table-component': TableComponent,
		},
		mounted() {
			eventBus.$on('selectedStudent', data => {
				if ( ! data.status) {
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
		computed: {
			filteredStudent() {
				return this.students.filter(student => {
					return student.firstname.toLowerCase().includes(this.search.toLowerCase())
					  || student.surname.toLowerCase().includes(this.search.toLowerCase())
					  || student.email.toLowerCase().includes(this.search.toLowerCase());
				});
			},
		},
	};
</script>
