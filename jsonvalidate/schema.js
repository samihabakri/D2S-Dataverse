	((w)=>{
		w['schema']={

		'title':'Person Object Schema',
		'type':'object',

		'properties':{
			'FirstName':{
				'type':'string'
			},
			'LastName':{
				'type':'string'
			},
			
			'Age':{
				'type':'integer',
				'minimum':18,
				'maximum':100
			}




		},

		'if':{'properties':{'Age':{'maximum':60}}},
		'then':{'required':['Salary']},
		'else':{'required':['Pension']}




	};
})(window);
