<template>
	<div class="header">
		<div><img alt="Logo" src="/images/logo_sm.jpg" title="logo"></div>
		<div style='margin: 10px;  text-align: left'>
			<input :value="selectText" @click="toggleSelection()" type="button"/>
			<input @click="exportStudents()" type="button" value="Export Students"/>
			<input @click="exportCourseAttendance()" type="button" value="Export Course Attendance"/>
		</div>
	</div>
</template>
<script>
	export default {
		props: ['selected'],
		data() {
			return {
				selectAll: true,
				message: 'not updated',
			};
		},
		methods: {
			toggleSelection() {
				eventBus.$emit('toggleSelection', this.selectAll);
				this.selectAll = ! this.selectAll;
			},
			exportStudents() {
				if (this.selected.length > 0) {
					swal({
						title: 'Export students',
						text: 'Are you sure you want to download the current selection?',
						type: 'info',
						showCancelButton: true,
						closeOnConfirm: false,
						showLoaderOnConfirm: true,
						cancelButtonText: 'No',
						confirmButtonText: 'Yes',
					}, () => {
						axios.post('/api/export/students', {
							students: this.selected,
							all: false,
							api_token: Laravel.api_token, // --> we need to pass this as you use auth:api
						}).then(({ data }) => {
							// NOTE: here we're get a response from Csv object in the server
							//  because response will return a csv string and because
							//  it's asyn response, i created a methid called save
							//  that will download the response into a csv blob
							//  it gets the data which is returned from the server
							//  and file name as string and it will try to save it
							this.save(data, 'students.csv');
							swal.close();
						}, (response) => {
							sweetAlert('Oops...', 'We are terribly sorry, but there it was an error downloading your selection, please try again', 'error');
						});
					});

				} else {
					sweetAlert('Oops...', 'You need to select some students in order to export them', 'error');
				}
			},
			exportCourseAttendance() {
				swal({
					title: 'Export course attendance',
					text: 'Are you sure you want to download the current selection?',
					type: 'info',
					showCancelButton: true,
					closeOnConfirm: false,
					showLoaderOnConfirm: true,
					cancelButtonText: 'No',
					confirmButtonText: 'Yes',
				}, () => {
					axios.post('/api/export/course-attendance', { api_token: Laravel.api_token })
					     .then(({ data }) => {
						     this.save(data, 'courses.csv');
						     swal.close();
					     }, (response) => {
						     sweetAlert('Oops...', 'We are terribly sorry, but there it was an error downloading your selection, please try again', 'error');
					     });
				});
			},
			save(data, fileName) {
				const a = document.createElement('a');
				document.body.appendChild(a);
				a.style    = 'display: none';
				const blob = new Blob([data], { type: 'octet/stream' }),
				      url  = window.URL.createObjectURL(blob);
				a.href     = url;
				a.download = fileName;
				a.click();
				window.URL.revokeObjectURL(url);
			},
		},
		computed: {
			selectText() {
				return this.selectAll ? 'Select all' : 'Unselect all';
			},
		},
	};
</script>
