/**
 * File
 * Created    8/5/14 1:23 PM
 * Author     Matt Thomas | matt@betweenbrain.com | http://betweenbrain.com
 * Support    https://github.com/betweenbrain/
 * Copyright  Copyright (C) 2014 betweenbrain llc. All Rights Reserved.
 * License    GNU GPL v2 or later
 */

(function ($) {
	$(document).ready(function () {
		$('#jform_recipients').change(function () {
			var recipient = $('#jform_recipients option:selected').val();
			$('input[name=id]').val(recipient);
		});

		$('#jform_country').change(function () {
			var newOptions = {'State': 'State', 'Other': 'Other'};
			var selected = $('#jform_country option:selected').val();

			if (selected === 'United States') {
				newOptions = {'State': 'State', 'Alabama': 'Alabama', 'Alaska': 'Alaska', 'Arizona': 'Arizona', 'Arkansas': 'Arkansas', 'California': 'California', 'Colorado': 'Colorado', 'Connecticut': 'Connecticut', 'Delaware': 'Delaware', 'District Of Columbia': 'District Of Columbia', 'Florida': 'Florida', 'Georgia': 'Georgia', 'Hawaii': 'Hawaii', 'Idaho': 'Idaho', 'Illinois': 'Illinois', 'Indiana': 'Indiana', 'Iowa': 'Iowa', 'Kansas': 'Kansas', 'Kentucky': 'Kentucky', 'Louisiana': 'Louisiana', 'Maine': 'Maine', 'Maryland': 'Maryland', 'Massachusetts': 'Massachusetts', 'Michigan': 'Michigan', 'Minnesota': 'Minnesota', 'Mississippi': 'Mississippi', 'Missouri': 'Missouri', 'Montana': 'Montana', 'Nebraska': 'Nebraska', 'Nevada': 'Nevada', 'New Hampshire': 'New Hampshire', 'New Jersey': 'New Jersey', 'New Mexico': 'New Mexico', 'New York': 'New York', 'North Carolina': 'North Carolina', 'North Dakota': 'North Dakota', 'Ohio': 'Ohio', 'Oklahoma': 'Oklahoma', 'Oregon': 'Oregon', 'Pennsylvania': 'Pennsylvania', 'Rhode Island': 'Rhode Island', 'South Carolina': 'South Carolina', 'South Dakota': 'South Dakota', 'Tennessee': 'Tennessee', 'Texas': 'Texas', 'Utah': 'Utah', 'Vermont': 'Vermont', 'Virginia': 'Virginia', 'Washington': 'Washington', 'West Virginia': 'West Virginia', 'Wisconsin': 'Wisconsin', 'Wyoming': 'Wyoming'};
			}

			if (selected === 'Canada') {
				newOptions = {'State': 'State', 'Alberta': 'Alberta', 'British Columbia': 'British Columbia', 'Manitoba': 'Manitoba', 'New Brunswick': 'New Brunswick', 'Newfoundland and Labrador': 'Newfoundland and Labrador', 'Northwest Territories': 'Northwest Territories', 'Nova Scotia': 'Nova Scotia', 'Nunavut': 'Nunavut', 'Ontario': 'Ontario', 'Prince Edward Island': 'Prince Edward Island', 'Quebec': 'Quebec', 'Saskatchewan': 'Saskatchewan', 'Yukon Territory': 'Yukon Territory'};
			}

			var select = $('#jform_state');
			select.empty();
			$.each(newOptions, function (key, value) {
				select.append($('<option></option>')
					.attr('value', value).text(key));
			});
		});
	});
})(jQuery)