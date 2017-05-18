<template>
	<section class="panel panel-default">
	<div class="calendarcard-top">
	<div>
		<ul>
			<li>Design</li>
			<li>s.31-R104</li>
			<li v-for="user in lecture.users">{{user.name}}</li>
		</ul>
	</div>
	<div>
	<p class="start-time">8<sup>30</sup></p>
	<p class="end-time">- 14:00</p>
	</div>
	</div>
	<div class="calendarcard-content">
	<p>{{lecture.description}}</p>
	<p>4 x <i class="fa fa-bolt" aria-hidden="true"></i>
 </p>
	<p>Design Streak</p>
	</div>
		<section v-if="isAtSchool">
			<button v-if="!isAttending" @click="attend(lecture.id)" class="btn btn-success">
			<span v-if="!isLoading">{{message}}</span>
			<span v-if="isLoading"><i class="fa fa-spinner fa-spin" aria-hidden="true"></i></span>
			</button>
		</section>
		<button disabled v-if="isAttending && isAttending != 'excused' && isAttending != 'not attended'" class="btn btn-success" >You attends</button>
		<button class="btn btn-danger" disabled v-if="isAttending == 'excused'">Excused</button>
		<button class="btn btn-danger"  v-if="isAttending == 'not attended'">Not attended</button>
		<section v-if="!isAtSchool && !isAttending">
			<button class="btn btn-danger">Not attending</button>
		</section>
	</section>
</template>

<script>
	export default {
		props: ['lecture'],
		data: function () {
			return {
				isAttending: true,
				notAttending: true,
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