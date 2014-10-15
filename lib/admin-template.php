    <div class="wrap">
        <h2>Usage</h2>
        To create a section with tabs you only need to wrap your content inside of the shortcode. 

        <pre>
[EasyTabs]
    [tab title="First Tab"]
        Content you want inside of the Tab
    [/tab]
[/EasyTabs]
        </pre>

And for add more tabs inside of the same wrapper you only need to create a new section with the tab shortcode, as follows.
        <pre>
    [tab title="Second Tab"]
        Content you want inside of the Tab
    [/tab]
        </pre>

        <h2>Disable default CSS</h2>
        <form method="POST" action="">
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">
                        <label for="disable_css">
                            Disable loading default CSS
                        </label> 
                    </th>
                    <td>
                        <input type="checkbox" name="disable_css" size="25" />
                    </td>
                </tr>
            </table>
        </form>
        <h4>Make sure to add the next CSS classes to your custom theme (if you disable to load the default CSS)</h4>
        <textarea rows="25" cols="70">
.etabs { 
    margin: 0; 
    padding: 0; 
}
.tab { 
    display: inline-block; 
    zoom:1; 
    *display:inline; 
    background: #eee; 
    border: solid 1px #999; 
    border-bottom: none; 
    -moz-border-radius: 4px 4px 0 0; 
    -webkit-border-radius: 4px 4px 0 0; 
}
.tab a { 
    font-size: 14px; 
    line-height: 2em; 
    display: block; 
    padding: 0 10px; 
    outline: none; 
}
.tab a:hover { 
    text-decoration: underline; 
}
.tab.active { 
    background: #fff; 
    padding-top: 6px; 
    position: relative; 
    top: 1px; 
    border-color: #666; 
}
.tab a.active { 
    font-weight: bold; 
}
.tab-container .panel-container { 
    background: #fff; 
    border: solid #666 1px; 
    padding: 10px; 
    -moz-border-radius: 0 4px 4px 4px; 
    -webkit-border-radius: 0 4px 4px 4px; 
}
</textarea>
    </div>
