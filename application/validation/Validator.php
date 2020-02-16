<?php
namespace App\Validation;
use Respect\Validation\Validator as Respect;
use Respect\Validation\Exceptions\NestedValidationException;
class Validator
{
    protected $errors;
    public function validate($req, array $rules)
    {
        foreach ($rules as $field => $rule)
        {
            try
            {
                $rule->setName(ucfirst($field))->assert($req->getParam($field));

            }
            catch (NestedValidationException $e)
            {
                $this->errors[$field] = $e->getMessages();
            }
        }
        return $this;
    }
    public function getErrors()
    {
        return $this->errors;
    }
    public function setError($estr)
    {
        $this->errors['Email'][0] = $estr;
    }
    public function failed()
    {
        return !empty($this->errors);
    }
}