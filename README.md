<h1>JSM&#039;s Non-Breaking Space for French Content</h1>

<table>
<tr><th align="right" valign="top" nowrap>Plugin Name</th><td>JSM&#039;s Non-Breaking Space for French Content</td></tr>
<tr><th align="right" valign="top" nowrap>Summary</th><td>Adds a non-breaking space between words and punctuation marks to avoid inappropriate line-breaks in French.</td></tr>
<tr><th align="right" valign="top" nowrap>Stable Version</th><td>1.6.1-1</td></tr>
<tr><th align="right" valign="top" nowrap>Requires At Least</th><td>WordPress 3.0</td></tr>
<tr><th align="right" valign="top" nowrap>Tested Up To</th><td>WordPress 4.6</td></tr>
<tr><th align="right" valign="top" nowrap>Contributors</th><td>jsmoriss</td></tr>
<tr><th align="right" valign="top" nowrap>License</th><td><a href="http://www.gnu.org/licenses/gpl.txt">GPLv3</a></td></tr>
<tr><th align="right" valign="top" nowrap>Tags / Keywords</th><td>nbsp, french, exclamation, question, interrogation, line-break</td></tr>
</table>

<h2>Description</h2>

<p>This plugin will add non-breaking spaces where appropriate in the content, excerpt, comments, and text widget &mdash; skipping over pre-formatted code blocks and scripts &mdash; and if the <code>&lt;!--:fr--&gt;</code> HTML  tag is found, non-breaking spaces will be added only between the <code>&lt;!--:fr--&gt;</code> and <code>&lt;!--:--&gt;</code> HTML tags.</p>

<h4>Recognized Punctuation</h4>

<ul>
<li>!</li>
<li>?</li>
<li>:</li>
<li>;</li>
<li>%</li>
<li>&laquo;</li>
<li>&raquo;</li>
</ul>

<h4>Developer Filters</h4>

<p><em>'nbsp_french_filter_priority' ( $filter_prio )</em> &mdash; The default filter priority (default: 10).</p>

<p><em>'nbsp_french_add_filters' ( $filter_list )</em> &mdash; The default filter list to hook (default: 'the_title', 'the_content', 'the_excerpt', 'comment_text', 'widget_title', 'widget_text' ).</p>

<p><em>'nbsp_french_filter_'.$filter_name ( $bool )</em> &mdash; Hook the filter name (default: true).</p>

<p>Hook additional text filters by including their names in the 'nbsp_french_add_filters' array (see above), or hook filters individually in your functions.php file:</p>

<pre>
add_filter( $filter_name, array( 'NbspFrench', 'filter' ) );
</pre>


<h2>Installation</h2>

<h4>Automated Install</h4>

<ol>
<li>Go to the wp-admin/ section of your website</li>
<li>Select the <em>Plugins</em> menu item</li>
<li>Select the <em>Add New</em> sub-menu item</li>
<li>In the <em>Search</em> box, enter the plugin name</li>
<li>Click the <em>Search Plugins</em> button</li>
<li>Click the <em>Install Now</em> link for the plugin</li>
<li>Click the <em>Activate Plugin</em> link</li>
</ol>

<h4>Semi-Automated Install</h4>

<ol>
<li>Download the plugin archive file</li>
<li>Go to the wp-admin/ section of your website</li>
<li>Select the <em>Plugins</em> menu item</li>
<li>Select the <em>Add New</em> sub-menu item</li>
<li>Click on <em>Upload</em> link (just under the Install Plugins page title)</li>
<li>Click the <em>Browse...</em> button</li>
<li>Navigate your local folders / directories and choose the zip file you downloaded previously</li>
<li>Click on the <em>Install Now</em> button</li>
<li>Click the <em>Activate Plugin</em> link</li>
</ol>


<h2>Frequently Asked Questions</h2>

<h4>Frequently Asked Questions</h4>

<ul>
<li>None</li>
</ul>


<h2>Other Notes</h2>

<h3>Other Notes</h3>
<h4>Additional Documentation</h4>

<ul>
<li>None</li>
</ul>

