<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width"/>

        <style>
        $action-color: #71bc37;

// Global
* {
  margin: 0;
  padding: 0;
  font-size: 100%;
  font-family: 'Avenir Next', "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
  line-height: 1.65;
}

img {
  max-width: 100%;
  margin: 0 auto;
  display: block;
}

body,
.body-wrap {
  width: 100% !important;
  height: 100%;
  background: #efefef;
  -webkit-font-smoothing:antialiased;
  -webkit-text-size-adjust:none;
}

a {
  color: $action-color;
  text-decoration: none;
}

.text-center {
  text-align: center;
}

.text-right {
  text-align: right;
}

.text-left {
  text-align: left;
}

// Button
.button {
  display: inline-block;
  color: white;
  background: $action-color;
  border: solid $action-color;
  border-width: 10px 20px 8px;
  font-weight: bold;
  border-radius: 4px;
}

// Typography
h1, h2, h3, h4, h5, h6 {
  margin-bottom: 20px;
  line-height: 1.25;
}
h1 {
  font-size: 32px;
}
h2 {
  font-size: 28px;
}
h3 {
  font-size: 24px;
}
h4 {
  font-size: 20px;
}
h5 {
  font-size: 16px;
}

p, ul, ol {
  font-size: 16px;
  font-weight: normal;
  margin-bottom: 20px;
}

// layout
.container {
  display: block !important;
  clear: both !important;
  margin: 0 auto !important;
  max-width: 580px !important;

  table {
    width: 100% !important;
    border-collapse: collapse;
  }

  .masthead {
    padding: 80px 0;
    background: #FF6600;
    color: white;

    h1 {
      margin: 0 auto !important;
      max-width: 90%;
      text-transform: uppercase;
    }
  }

  .content {
    background: white;
    padding: 30px 35px;

    &.footer {
      background: none;

      p {
        margin-bottom: 0;
        color: #888;
        text-align: center;
        font-size: 14px;
      }

      a {
        color: #888;
        text-decoration: none;
        font-weight: bold;
      }
    }
  }
}

        </style>
    </head>
    <body class="body-wrap">

            <!-- Message start -->
            <table>
                <tr>
                    <td align="center" class="masthead">

                       <h2>You received a message from your Portfolio:</h2>

                    </td>
                </tr>

                 <tr>
                    <td class="content">

                        <p>
						<strong>Name:</strong> {{ $name }}
						</p>
						<br>
						<p>
						<strong>Subject:</strong> {{ $subject }}
						</p>
						<br>

						<p>
						<strong>Email:</strong>{{ $email }}
						</p><br>

                        <p>{{ $user_message }}</p>

                        <address>
                       <p> From:</p>
                       {{$name}}>>{{$email}}

                        	
                        </address>

                        <p>send from <a href="http://wafutech.com/contact-us"> http://wafutech.com/contact-us</a></p>
                       }
                       }

                        

                    </td>
                </tr>
            </table>



  </body>
</html>