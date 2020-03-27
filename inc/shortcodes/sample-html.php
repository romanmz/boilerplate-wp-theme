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
	<img src="https://picsum.photos/150" alt="" width="75">
	<a href="#">
		<img src="https://picsum.photos/150" alt="" width="75">
	</a>
</p>
<figure>
	<img src="https://picsum.photos/150" alt="" width="75">
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
