from flask import Flask, request, redirect, url_for

app = Flask(__name__)

def check_credentials(username, password):
	"""
	Dummy login check
	"""
	return False

def render_template(template: str, variables: dict):
	result = template
	for k,v in variables.items():
		result = template.replace("{"+k+"}", v)
	return result 

@app.route('/', methods=["GET", "POST"])
def login():
	if request.method == "POST":
		email = request.form.get("email")
		password = request.form.get("password")
		if not check_credentials(email, password):
			return redirect(url_for("login", error="Invalid credentials"))
		return "You somehow logged in?"

	error = request.args.get("error") or ""
	with open("login.html") as f:
		template = f.read()
	return render_template(template, {"error": error})

@app.route('/flask-health-check')
def flask_health_check():
	return "success"
