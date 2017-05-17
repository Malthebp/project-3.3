<template>
	<section>
	<p>{{lecture.description}}</p>
	<ul>
		<li v-for="user in lecture.users">{{user.name}}</li>
	</ul>
	</section>
</template>


<script>
	export default {
		props: ['lecture'],
	}

</script>