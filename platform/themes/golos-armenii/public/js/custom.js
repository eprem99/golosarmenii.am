$('#dom-id').dateRangePicker({
  autoClose: true,
  separator: '|',
  endDate: '2021-03-28',
	singleDate : false,
	showShortcuts: false,
  language: 'ru',
  customArrowPrevSymbol: 'dfgd',
  customArrowNextSymbol: 'dfgdf',
	singleMonth: true,
  inline:true,
  showTopbar: false,
	container: '#date-range12-container',
	alwaysOpen:true,
}).bind('datepicker-change',function(event,obj)
{
  // alert(obj['value']);
  setTimeout(function(){window.location.href = '/search?s='+obj['value']; }, 500);
  

	/* This event will be triggered when second date is selected */
	 console.log(obj['value']);
	// obj will be something like this:
	// {
	// 		date1: (Date object of the earlier date),
	// 		date2: (Date object of the later date),
	//	 	value: "2013-06-05 to 2013-06-07"
	// }
});
