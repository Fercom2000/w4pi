<html>
<head>
	<link rel="stylesheet" type="text/css" href="comment.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
</head>
<body>
<div class="logo">
</div>
<div class="menu">
	<ul class="menuL">
	  <li class="menuL"><a class="active" href="home.html">Home</a></li>
	  <li class="menuL"><a href="join.html">Join as a Reviewer</a></li>
	  <li class="menuL"><a href="contact.html">Join as an Author</a></li>
	  <li class="menuL"><a href="demo.html">Demos</a></li>
	</ul>
</div>
<div class="content">
	<div class="contactText">
		<h1>Are you interested on having your leaflet reviewed?</h1>
		<h2>Send us a message</h2>
		<div class='contactForm' class="cf1" data-state="    desktop left" id="comp-j96vur49" data-dcf-columns="2">
			<form role="form" aria-label="contact form" novalidate="" id="comp-j96vur49form-wrapper" class="cf1form-wrapper">
				<div id="comp-j96vur49wrapper" class="cf1wrapper">
					<div>
						<input id="field1" required="" aria-invalid="false" name="Name" value="" class="cf1_required" placeholder="Name *" data-aid="nameField" type="text">
						<input id="field2" required="" aria-invalid="false" name="Email" value="" class="cf1_required" placeholder="Email *" data-aid="emailField" type="text">
						<input id="field3" aria-invalid="false" name="Subject" value="" class="" placeholder="Subject" data-aid="subjectField" type="text">
					</div>
					<textarea name="Message" class="cf1fieldMessage" placeholder="Message" id="comp-j96vur49fieldMessage">
					</textarea>
					<button type="submit" id="comp-j96vur49submit" class="cf1submit">Send</button>
					<span aria-live="polite" class="cf1_success cf1notifications" id="comp-j96vur49notifications"></span>
				</div>
			</form>	
		</div>
	</div>
</div>
<div class="foot">
	<span>Created by Fernando Santos,&nbsp;2018. Proudly created with the sponsorship of <a href="https://www.conacyt.gob.mx/" target="_blank" data-content="https://www.conacyt.gob.mx/" data-type="external" rel="nofollow">CONACYT&nbsp;</a> and <a href="https://www.southampton.ac.uk/" target="_blank" data-content="https://www.southampton.ac.uk/" data-type="external" rel="nofollow">The University of Southampton&nbsp;</a><span style="display:none;">&nbsp;</span></span>
</div>
<script>
	function getSelected() {
		if (window.getSelection) {
			return window.getSelection();
		}
		else if (document.getSelection) {
			return document.getSelection();
		}
		else {
			var selection = document.selection && document.selection.createRange();
			if (selection.text) {
				return selection.text;
			}
			return false;
		}
		return false;
	}

	$(document).ready(function() {
		
      var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById('commentDisplay').innerHTML = this.responseText;
            }
        };
        xmlhttp.open('GET', 'commentShow.php', true);
        xmlhttp.send();
		
		var selectionImage;
		var getAllBetween = function (firstEl,lastEl) {
			var firstElement = $(firstEl); // First Element
			var lastElement = $(lastEl); // Last Element
			var collection = new Array(); // Collection of Elements
			collection.push(firstElement.attr('id')); // Add First Element to Collection
			$(firstEl).nextAll().each(function(){ // Traverse all siblings
				var siblingID  = $(this).attr('id'); // Get Sibling ID
				if (siblingID != $(lastElement).attr('id')) { // If Sib is not LastElement
					collection.push($(this).attr('id')); // Add Sibling to Collection
				} else { // Else, if Sib is LastElement
					collection.push(lastElement.attr('id')); // Add Last Element to Collection
					return false; // Break Loop
				}
			});         
			return collection; // Return Collection
		}
		$('.paragraph').mouseup(function(e) {
			var selection = getSelected();				

			if (!selectionImage) {
				selectionImage = $('<button>').attr({
					type: 'button',
					title: 'Comment on the seleceted text',
					id: 'quote-place'

				}).html("Comment").css({
					"color": "red"
				}).hide();

				$(document.body).append(selectionImage);

			}
			$("#quote-place").click(function quote() {
				if (window.getSelection) { // non-IE
					userSelection = window.getSelection();
					rangeObject = userSelection.getRangeAt(0);
					if (rangeObject.startContainer == rangeObject.endContainer) {
						document.cform.pIds.value =rangeObject.startContainer.parentNode.id;
					} else {
						document.cform.pIds.value =getAllBetween(
							rangeObject.startContainer.parentNode,
							rangeObject.endContainer.parentNode);
					}
				} else if (document.selection) { // IE lesser
					userSelection = document.selection.createRange();
					var ids = new Array();

					if (userSelection.htmlText.toLowerCase().indexOf('span') >= 0) {
						$(userSelection.htmlText).filter('span').each(function(index, span) {
							ids.push(span.id);
						});
						document.cform.pIds.value =ids;
					} else {
						document.cform.pIds.value = userSelection.parentElement().id;
					}
				}
				var txt = '';
				if (window.getSelection) {
					txt = window.getSelection();
				}
				else if (document.getSelection) {
					txt = document.getSelection();
				}
				else if (document.selection) {
					txt = document.selection.createRange().text;
				}
				else {
					return;
				}
				document.cform.selectedText.value = txt;

			}).mousedown(function() {

				if (selectionImage) {
					selectionImage.fadeOut();
				}
			});

			selectionImage.css({
				top: e.pageY - 30,
				//offsets
				left: e.pageX - 13 //offsets
			}).fadeIn();
		});			
	});
</script>
</body>
</html>