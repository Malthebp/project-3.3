<template>
	<section class="panel panel-default">
	<p>{{lecture.description}}</p>
	<ul>
		<li v-for="user in lecture.users">{{user.name}}</li>
	</ul>
		<section v-if="isAtSchool">
			<button v-if="!isAttending" @click="attend(lecture.id)" class="btn btn-success">
			<span v-if="!isLoading">{{message}}</span>
			<span v-if="isLoading"><i class="fa fa-spinner fa-spin" aria-hidden="true"></i></span>
			</button>
			<button disabled v-if="isAttending == true" class="btn btn-success" >You attends</button>
			<button class="btn btn-danger" disabled v-if="isAttending == 'not attending'">Not Attending</button>
		</section>
		<section v-else>
			<button v-if="!isAtSchool" class="btn btn-danger">Not attending</button>
		</section>
	</section>
</template>

<script>
	export default {
		props: ['lecture'],
		data: function () {
			return {
				isAttending: false,
				notAttending: null,
				message: 'Attending',
				isLoading: false,
				isAtSchool: false
			}
		},
		methods: {
			attend: function(lectureId) {
				this.isLoading = true;
				axios.post('/lecture/attend/'+lectureId).then(response => {
					this.isAttending = true;
					this.isLoading = false;
					this.message = response.data.message;
					console.log(response.data.message);
				}, response => {
					this.isLoading = false;
					this.message = response.data.message;
				});
			},
			checkForAttendance: function () {
				this.isLoading = true;
				axios.get('/lecture/attendance/'+this.lecture.id).then(response => {
					this.isLoading = false;
					this.isAttending = response.data.attending;
					console.log(response.data.attending);
				});
			},
			isAtSchoolFunc: function () {
				axios.get('/user/isatschool/'+this.lecture.id).then(response => {
					this.isAtSchool = response.data.isAtSchool;
				});
			}

		},
		created: function () {
			this.checkForAttendance();
			this.isAtSchoolFunc();
		}
	}
</script>