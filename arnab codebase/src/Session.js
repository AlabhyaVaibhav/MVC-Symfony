
var UserProfile = (function() {
	var full_name = "";
	var SSID = "";
      
	var getName = function() {
		return full_name;
	};

	var setName = function(firstname, lastname) {
		full_name = firstname+" "+lastname;
	};

	var getSSID = function() {
		return SSID;
	};

	var setSSID = function(hash) {
		SSID = hash;
	};
      
	return {
		getName: getName,
		setName: setName,
		getSSID: getSSID,
		setSSID: setSSID,
	}
      
})();

export default UserProfile;
