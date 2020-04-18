new Vue({
    el: '#app',
	data:{
		message:''
	},
	methods:{
		send(){
			console.log(this.message);
		}
	}
});