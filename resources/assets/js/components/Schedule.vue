<template>
	<section class="row">
	<div class="col-md-6">
	<button class="schedule-button" @click="previousWeek"><i class="fa fa-arrow-left" aria-hidden="true"></i>
</button>
		<nav id="schedule">
		<p>{{month}}</p>
			<ul>
				<li v-for="day in days" ><a href="#" @click="getLecture(day)">{{day.name}} <span class="date">{{day.day}}</span></a></li>
			</ul>
		</nav>
		<button class="schedule-button" @click="nextWeek"><i class="fa fa-arrow-right" aria-hidden="true"></i>
</button>
	</div>
	<div class="col-md-6">
		<lecture v-if="!isLoading"  v-for="lecture in lectures" v-bind:lecture="lecture" :key="lecture.id"></lecture>
		<span v-if="isLoading"><i class="fa fa-spinner fa-spin" aria-hidden="true"></i>
</span>
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
				message: null,
				isLoading: false
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
					//Pushes the new date to the array. Format example: 14, Su
				    this.days.push({day: moment(day).format('DD'), name: moment(day).format('dd')});
				    
				    day = day.clone().add(1, 'd');
				    //Set the month to the year of the week.
				    this.month = moment(day).format('MMM');
				    //Set the year to the year of the week.
				    this.year = moment(day).format('YYYY');
				}

				console.log(this.days);
			},
			nextWeek: function(){
				//make the chosenweek the next
				this.chosenWeek++;
				//Reset the array
				this.days = [];
				//Initialize a new calendar with the new week.
				this.datesInWeek();
			},
			previousWeek: function () {

				//Make the chosenweek the previous. 
				this.chosenWeek--;
				//Reset the array
				this.days = [];
				//Initialize a new calendar with the new week. 
				this.datesInWeek();
			},
			getLecture: function(date){
				//Remove the written date (example: , we).
				//var date = date.substring(0, date.indexOf(','));
				var date = date.day

				//Create a date that contains the correct information about the picked date. Year, month, day. 
				var date = this.year + '-' + this.month + '-' + date;

				//Start loading icon
				this.isLoading = true;
				axios.get('/lecture/get/'+date).then(response => {
					// console.log(response.data);
					//Getting current picked days lectures. By AJAX
					this.lectures = response.data.lecture;

					//stop loading icon
					this.isLoading = false;
				});
			}
		},
		created: function (){
			//Initialize the calendar  
			this.datesInWeek();

			//When this component is created, get the current day and lectures. 
			var today = moment().format('DD, dd');
			this.getLecture(today);
		}
	}
</script>	