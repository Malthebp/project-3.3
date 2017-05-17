<template>
	<section class="row">
	<div class="col-md-6">
		<nav>
		{{month}}  {{year}}
			<ul>
				<li v-for="day in days" ><a href="#" @click="getLecture(day)">{{day}}</a></li>
			</ul>
		</nav>
		<button @click="previousWeek">Previous week</button>
		<button @click="nextWeek">Next week</button>
	</div>
	<div class="col-md-6">
		<lecture  v-for="lecture in lectures" v-bind:lecture="lecture"></lecture>
	</div>
		
	</section>
</template>

<script>
import moment from 'moment'
import lecture from './Lecture'
	export default {
		components: {lecture},
		data: function () {
			return {
				days: [],
				chosenWeek: 0,
				year: null,
				month: null,
				lectures: [],
				message: null
			}
		},
		methods: {
			datesInWeek: function () {
				//Start of the current week, the add() adds another week, which is specified by a variable. 

				var startOfWeek = moment().startOf('week').add(this.chosenWeek,'weeks');
				var endOfWeek = moment().endOf('week').add(this.chosenWeek,'weeks');

				//Local variables
				var day = startOfWeek;

				//Generate all the dates in the given week.
				while (day <= endOfWeek) {
				    this.days.push(moment(day).format('DD, dd'));
				    day = day.clone().add(1, 'd');
				    this.month = moment(day).format('MM');
				    this.year = moment(day).format('YYYY');
				}

				console.log(this.days);
			},
			nextWeek: function(){
				this.chosenWeek++;
				this.days = [];
				this.datesInWeek();
			},
			previousWeek: function () {
				this.chosenWeek--;
				this.days = [];
				this.datesInWeek();
			},
			getLecture: function(date){
				//Remove the written date (example: , we).
				var date = date.substring(0, date.indexOf(','));
				//Create a date that contains the correct information about the picked date. Year, month, day. 
				var date = this.year + '-' + this.month + '-' + date;

				axios.get('/lecture/get/'+date).then(response => {
					// console.log(response.data);
					//Getting current picked days lectures. By AJAX
					this.lectures = response.data.lecture;
				});
			}
		},
		created: function (){
			this.datesInWeek();
		}
	}
</script>	