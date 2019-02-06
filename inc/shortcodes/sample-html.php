<?php

// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) exit;



// ==================================================
// [sample-html] SHORTCODE
// ==================================================

add_shortcode( 'sample-html', 'shortcode_sample_html' );
function shortcode_sample_html( $atts=[], $content='' ) {
	ob_start();
	?>
<h1>Heading 1. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris commodo molestie tortor.</h1>
<h2>Heading 2. Hendrerit quis blandit congue, sodales id quam. Suspendisse potenti. Donec tincidunt lectus congue magna.</h2>
<h3>Heading 3. Pellentesque pretium lacinia est vel tincidunt. Ut quis nisi nec urna pulvinar aliquet nec eu ligula. Sed sed diam eu ligula varius consectetur.</h3>
<h4>Heading 4. Integer magna turpis, commodo eget blandit ut, porta ut libero. Cras eleifend erat id eros rutrum tempor. Nam magna orci, mollis ut vehicula at, lacinia eu nibh.</h4>
<h5>Heading 5. Nulla placerat eros nec quam porta interdum. Quisque eu dapibus velit. Nam suscipit orci quis enim rhoncus sagittis. Vivamus auctor arcu id augue placerat et tincidunt ipsum ornare.</h5>
<h6>Heading 6. Sed facilisis auctor condimentum. Aenean at odio vitae velit pharetra gravida ut tincidunt est. Curabitur eget metus orci, non ullamcorper nisl. Vestibulum in mi et metus ornare ultrices. Phasellus ac luctus ligula.</h6>
<p>Paragraph. Lorem ipsum dolor sit amet, <em>consectetur adipiscing</em> elit. <strong>Sed iaculis justo</strong> sed libero lacinia cursus. Suspendisse potenti. Lorem ipsum dolor   sit amet, consectetur adipiscing elit. Phasellus fringilla, neque vel   fringilla fringilla, quam leo condimentum eros, ut feugiat est nunc a   neque. Duis sagittis tellus non urna dapibus eget volutpat lorem   venenatis. Fusce ut nisl mollis urna volutpat interdum eu eu diam. Donec   mattis sollicitudin nisi a posuere. Praesent sem nisl, adipiscing vel   placerat ac, fermentum sed odio. Nam ac tortor elit, fermentum varius ligula.</p>
<p>Inline Markup: <a href="#">hyperlinks</a>, <em>emphasized text</em>, <strong>strong text</strong>, <mark>marked content</mark>, <abbr title="Abbreviations">Abbrs</abbr>, <small>small print</small>, <sub>subscript text</sub>, <sup>superscript text</sup>, <del>deleted text</del>, <ins>inserted text</ins>.</p>


<hr>
<h3>Lists</h3>
<ul>
	<li>Unordered list
		<ul>
			<li>Nested unordered list</li>
			<li>Consectetur adipiscing elit</li>
			<li>Sed iaculis   justo sed
				<ul>
					<li>Third nested list</li>
					<li>Consectetur adipiscing elit</li>
					<li>Sed iaculis   justo sed</li>
				</ul>
			</li>
		</ul>
	</li>
	<li>Quam leo condimentum</li>
	<li>Fusce ut nisl mollis</li>
</ul>
<ol>
	<li>Ordered list
		<ol>
			<li>Nested ordered list</li>
			<li>Fermentum sed odio</li>
			<li>Donec   mattis sollicitudin</li>
		</ol>
	</li>
	<li>Praesent sem nisl</li>
	<li>Adipiscing vel   placerat</li>
</ol>
<dl>
	<dt>Definition Term</dt>
	<dd>Definition Description. Morbi placerat vulputate felis at feugiat. Donec eget tellus sed magna euismod rhoncus eget sit amet tellus. Curabitur magna nisl, placerat quis blandit in, lobortis et diam.</dd>
</dl>


<hr>
<h3>Quotes</h3>
<blockquote>
	<p>Integer volutpat faucibus lorem nec <em>consectetur. Vestibulum placerat</em>, diam vitae vulputate feugiat, nisl nibh egestas ante, eu congue leo   neque vel sem. Morbi vel justo massa, a imperdiet magna. Nam vulputate posuere blandit. Donec tincidunt sollicitudin viverra.</p>
	<p><cite>Citation inside block quote</cite></p>
</blockquote>
<p>This is an <q>inline quote</q> followed by its <cite>inline citation</cite>.</p>


<hr>
<h3>Code</h3>
<pre>
// &lt;pre&gt; formatted text:
function food_alert( <var>taste</var> ) {
    var <var>chinese_food</var> = "Chinese food is "+<var>taste</var>;
    console.log( <var>chinese_food</var> );
}
food_alert( <kbd>"Yummy!"</kbd> );
log: <samp>Chinese food is Yummy!</samp></pre>
<p>A fragment of <code>computer &lt;code&gt;</code></p>


<hr>
<h3>Images and Figures</h3>
<p>
	<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAJYAAACWCAMAAAAL34HQAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAA3FpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNS1jMDE0IDc5LjE1MTQ4MSwgMjAxMy8wMy8xMy0xMjowOToxNSAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD0ieG1wLmRpZDpiMzc4MjczNC01ZGQyLTZlNDUtOTFlZC0zOTNhY2M4NzBhODEiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6NjI1RDQ4RDBEMEQwMTFFMzkyMTBEREIyNTc1Nzk3RjciIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6NjI1RDQ4Q0ZEMEQwMTFFMzkyMTBEREIyNTc1Nzk3RjciIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENDIChXaW5kb3dzKSI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOmEzOTgzZjg5LTNiNWMtYzc0OS1hZDY5LTg1NDRmYTk3NTZkZCIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDpiMzc4MjczNC01ZGQyLTZlNDUtOTFlZC0zOTNhY2M4NzBhODEiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz5dDF7iAAAAMFBMVEVmZmb////Ly8v39/fd3d2YmJitra23t7d0dHTm5uajo6Pu7u7U1NSMjIzBwcGAgICGZiluAAABcElEQVR42uzUYY+DIAyAYUsLqKD+/397BfW2+7DLJaeJH94n2YKlGw1UhgEAAAAAAAAAAAAAAAAAAAB/EeTjlIRPub/86J8mEbHlcWWJpVx0e1xZvuYm+Yllta+2wlqkpBbMRTQNY9B+vlJX1ZbWA/GoJhYxa4PFRLMHLel8aVnx2K2aUxVf1mRNOQ5W5mg6Dt58Kcjqcc3JPKHlxh70wSIhZklDUK3Lpb2lZTzPY/Tlo/Qtm2Vpz3mQqb0a6gHfjVGt55r298UHbdaKB+crD1FEw7YfzBKK+O6tMu6N04X9nH0+9HiVnqv16C3d0y7us7Of/V8XtTkebdYjsdneymrhqn0g32VZT7uvrP7H/pzOQ5zfUnzy5yGW8xB1vOGtfCsre6dbe572lp90TSm8yvJATpMufTyfLR9lSi37trL8o9nqfhGU/YJQG19lnTdGryAVqbnfFCYyxRvvMAAAAAAAAAAAAAAAAAAA8GRfAgwA/RAHLeoQs1wAAAAASUVORK5CYII=" alt="" width="75">
	<a href="#">
		<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAJYAAACWCAMAAAAL34HQAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAA3FpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNS1jMDE0IDc5LjE1MTQ4MSwgMjAxMy8wMy8xMy0xMjowOToxNSAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD0ieG1wLmRpZDpiMzc4MjczNC01ZGQyLTZlNDUtOTFlZC0zOTNhY2M4NzBhODEiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6NjI1RDQ4RDBEMEQwMTFFMzkyMTBEREIyNTc1Nzk3RjciIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6NjI1RDQ4Q0ZEMEQwMTFFMzkyMTBEREIyNTc1Nzk3RjciIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENDIChXaW5kb3dzKSI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOmEzOTgzZjg5LTNiNWMtYzc0OS1hZDY5LTg1NDRmYTk3NTZkZCIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDpiMzc4MjczNC01ZGQyLTZlNDUtOTFlZC0zOTNhY2M4NzBhODEiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz5dDF7iAAAAMFBMVEVmZmb////Ly8v39/fd3d2YmJitra23t7d0dHTm5uajo6Pu7u7U1NSMjIzBwcGAgICGZiluAAABcElEQVR42uzUYY+DIAyAYUsLqKD+/397BfW2+7DLJaeJH94n2YKlGw1UhgEAAAAAAAAAAAAAAAAAAAB/EeTjlIRPub/86J8mEbHlcWWJpVx0e1xZvuYm+Yllta+2wlqkpBbMRTQNY9B+vlJX1ZbWA/GoJhYxa4PFRLMHLel8aVnx2K2aUxVf1mRNOQ5W5mg6Dt58Kcjqcc3JPKHlxh70wSIhZklDUK3Lpb2lZTzPY/Tlo/Qtm2Vpz3mQqb0a6gHfjVGt55r298UHbdaKB+crD1FEw7YfzBKK+O6tMu6N04X9nH0+9HiVnqv16C3d0y7us7Of/V8XtTkebdYjsdneymrhqn0g32VZT7uvrP7H/pzOQ5zfUnzy5yGW8xB1vOGtfCsre6dbe572lp90TSm8yvJATpMufTyfLR9lSi37trL8o9nqfhGU/YJQG19lnTdGryAVqbnfFCYyxRvvMAAAAAAAAAAAAAAAAAAA8GRfAgwA/RAHLeoQs1wAAAAASUVORK5CYII=" alt="" width="75">
	</a>
</p>
<figure>
	<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAJYAAACWCAMAAAAL34HQAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAA3FpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNS1jMDE0IDc5LjE1MTQ4MSwgMjAxMy8wMy8xMy0xMjowOToxNSAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD0ieG1wLmRpZDpiMzc4MjczNC01ZGQyLTZlNDUtOTFlZC0zOTNhY2M4NzBhODEiIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6NjI1RDQ4RDBEMEQwMTFFMzkyMTBEREIyNTc1Nzk3RjciIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6NjI1RDQ4Q0ZEMEQwMTFFMzkyMTBEREIyNTc1Nzk3RjciIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENDIChXaW5kb3dzKSI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOmEzOTgzZjg5LTNiNWMtYzc0OS1hZDY5LTg1NDRmYTk3NTZkZCIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDpiMzc4MjczNC01ZGQyLTZlNDUtOTFlZC0zOTNhY2M4NzBhODEiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz5dDF7iAAAAMFBMVEVmZmb////Ly8v39/fd3d2YmJitra23t7d0dHTm5uajo6Pu7u7U1NSMjIzBwcGAgICGZiluAAABcElEQVR42uzUYY+DIAyAYUsLqKD+/397BfW2+7DLJaeJH94n2YKlGw1UhgEAAAAAAAAAAAAAAAAAAAB/EeTjlIRPub/86J8mEbHlcWWJpVx0e1xZvuYm+Yllta+2wlqkpBbMRTQNY9B+vlJX1ZbWA/GoJhYxa4PFRLMHLel8aVnx2K2aUxVf1mRNOQ5W5mg6Dt58Kcjqcc3JPKHlxh70wSIhZklDUK3Lpb2lZTzPY/Tlo/Qtm2Vpz3mQqb0a6gHfjVGt55r298UHbdaKB+crD1FEw7YfzBKK+O6tMu6N04X9nH0+9HiVnqv16C3d0y7us7Of/V8XtTkebdYjsdneymrhqn0g32VZT7uvrP7H/pzOQ5zfUnzy5yGW8xB1vOGtfCsre6dbe572lp90TSm8yvJATpMufTyfLR9lSi37trL8o9nqfhGU/YJQG19lnTdGryAVqbnfFCYyxRvvMAAAAAAAAAAAAAAAAAAA8GRfAgwA/RAHLeoQs1wAAAAASUVORK5CYII=" alt="" width="75">
	<figcaption>Figure Caption. Morbi placerat vulputate felis at feugiat. Donec eget tellus sed magna euismod rhoncus eget sit amet tellus.</figcaption>
</figure>


<hr>
<h3>Tables</h3>
<table class="responsive-table">
	<caption>Table Caption</caption>
	<thead>
		<tr>
			<th>Table Head</th>
			<td>quisque sagittis</td>
			<td>porta augue</td>
			<td>ut imperdiet</td>
			<td>donec enim</td>
		</tr>
	</thead>
	<tbody>
		<tr>
			<th>Table Body</th>
			<td data-column-name="Column 1">risus eu</td>
			<td data-column-name="Column 2">urna fringilla</td>
			<td data-column-name="Column 3">sed libero</td>
			<td data-column-name="Column 4">Fusce ultrices</td>
		</tr>
		<tr>
			<th>vulputate</th>
			<td>quis diam</td>
			<td>porta tristique</td>
			<td>donec enim</td>
			<td>sed libero</td>
		</tr>
		<tr>
			<th>posuere</th>
			<td>risus eu</td>
			<td>urna fringilla</td>
			<td>sed libero</td>
			<td>Fusce ultrices</td>
		</tr>
		<tr>
			<th>tincidunt</th>
			<td>quis diam</td>
			<td>porta tristique</td>
			<td>donec enim</td>
			<td>sed libero</td>
		</tr>
	</tbody>
	<tfoot>
		<tr>
			<th>Table Foot</th>
			<td>cras tempus</td>
			<td>tempor magna</td>
			<td>Fusce ultrices</td>
			<td>quisque sagittis</td>
		</tr>
	</tfoot>
</table>


<hr>
<h3>Forms</h3>
<form>
	<fieldset>
		<legend>Fieldset Legend</legend>
		<p>
			<label for="input_text">Text:</label>
			<input id="input_text" type="text" placeholder="Placeholder text">
		</p>
		<p>
			<label for="textarea">Textarea:</label>
			<textarea id="textarea"></textarea>
		</p>
		<p>
			<label for="select">Select:</label>
			<select id="select">
				<optgroup label="Group 1">
					<option>Option 1</option>
					<option>Option 2</option>
				</optgroup>
				<optgroup label="Group 2">
					<option>Option 3</option>
					<option>Option 4</option>
				</optgroup>
			</select>
		</p>
		<div>Checkboxes</div>
		<ul>
			<li><input id="input_check_1" name="input_check_1" value="1" type="checkbox"> <label for="input_check_1">Option 1</label></li>
			<li><input id="input_check_2" name="input_check_2" value="1" type="checkbox"> <label for="input_check_2">Option 2</label></li>
		</ul>
		<div>Radio Buttons</div>
		<ul>
			<li><input id="input_radio_1" name="input_radio" value="1" type="radio"> <label for="input_radio_1">Option 1</label></li>
			<li><input id="input_radio_2" name="input_radio" value="2" type="radio"> <label for="input_radio_2">Option 2</label></li>
		</ul>
		<p>
			<button type="submit">Submit</button>
		</p>
	</fieldset>
</form>


<hr>
<h3>Buttons</h3>
<p><a href="#" class="button">Button</a></p>


<hr>
<h3>Messages</h3>
<div class="message">You are now logged in. <a href="#">Sample link</a></div>
<div class="message message--error">The "email address" field is required. <a href="#">Sample link</a></div>
<div class="message message--success">Your application has been received! <a href="#">Sample link</a></div>
<div class="message message--alert">You are using an <strong>outdated browser</strong>. Please <a href="http://browsehappy.com/" target="_blank">upgrade your browser</a> to improve your experience.</div>


<hr>
<h3>Grids</h3>
<div class="multi-column-grid">
	<div><strong>Multi-column grid.</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer pulvinar diam quis dictum scelerisque.</div>
	<div>Aliquam porttitor est non congue sollicitudin.</div>
	<div>Proin mollis dapibus vehicula. Pellentesque aliquam arcu eu sapien consectetur vehicula. Mauris interdum congue ex.</div>
	<div>In vel feugiat tortor. Praesent et posuere mi. Cras ut vulputate diam. Vestibulum cursus, tellus vel dictum varius, justo sapien dictum magna.</div>
</div>
	<?php
	return ob_get_clean();
}
