How to make a module compatible with 1.6 AND 1.7

* Use legacy translation system ($this->l)
* Use 2 templates different depending on the version
* Implements getWidgetVariables and renderWidget but dont explicitly implements the php interface.
* Create all specific hook method like hookDisplayHeader and call renderWidget with the correct parameters
