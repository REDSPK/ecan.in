<?php
/**
 * Description of template_model
 *
 * @author FAIZAN ALI
 */
class Template_model extends CI_Model{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function process( $text ) {
        return preg_replace_callback('/\{(((?>[^\{\}]+)|(?R))*)\}/x', array( $this, 'replace' ), $text );
    }
 
    public function replace( $text ) {
        $text = $this->process( $text[ 1 ] );
        $parts = explode( '|', $text );
        $part = $parts[ array_rand( $parts ) ];
        return $part;
    }
    
    public function selectTemplate($var) {
        $firstname = "Faizan";
        $typeOfAssitance = "sample type of assitance";
        $additionalComments = "we have tried every thing";
        $senderName = "Imran";
        $template1 = "$firstname ,<br/>
                      {We apologize to be reaching out to you like this|We are sorry to get you involved|We hope that this is something you can help us with} {at the very last minute|though there is little time for your review|at the 11th hour} {but we really had no other place to turn to|but we had few other options}. {In the past you had been a great help so|Since you had been able to be assist in the past|Previously your input ended up being invaluable and} {we didn’t know if|it would be greatly appreciated if} {there was anything that could still be done|there are any options still on the table|there were still options to find a resolution to benefit all the parties involved}. We needed to bring this account to {your|someone's} attention. {We are concerned|The borrower is very worried|We have lost faith} {with how this file is being processed|with the responses we are getting|with the lack of clear communcation} and {the road that it has taken|where the file is at after the time invested|the lack of interest shown by the negotiator}. {{INSERTS}} <br/>
                       Additionally, $additionalComments. <br/>
                      {We have been attempting to move this file forward|We have done everything we can to move the file forward} but {the file has not moved forward as expected|we find ourselves in the same place|the negotiator has not taken the steps to proactively move this forward}. {Prior to reaching out to you|Before we found ourselves here trying to reach out to you|We attempted all other avenues before getting in contact with you} {we had spoken to|we spoke to|we reached out to} the {{TYPEOFASSISTANCE}} {department|area|group} and {attempted to escalate this to the negotaitor|we attempted to bring this to the negotiator's attention|we did all we could to bring attention to this file} but {file still has yet to move forward|there has been stagnation on this file we cannot get past}. {We have a complete|We have submited a complete|A complete submission of a} {{TYPEOFASSISTANCE}} {package|packet} there for some time on this file and have been doing our diligence to attempt to push this through as quickly as possible. {Is there anything that can still be done?|Is this the end of the road or can we do something here?|Given the circumstances is there anything we can do or anyone we can reach out to?} {The homeowner has really fallen into a tough situation|The homeowner has really stuggled to keep things together|The borrower is trying to manage that they can to keep this afloat|The homeowner would like to do what they can to avoid foreclsoure} and {really needs|requires|hopes that} $senderName {will to try to speak|will communicate|does what it can to transmit} to the {investor|beneficiary|party that holds the risk on the note} to {allow more time for this file to proceed|allow for this processing of this file to continue}. <br/>
                      {Thank you for your time, we greatly appreciate your efforts|As we know how busy you are, we greatly appreciate any efforts you can put into this|Your time is extremely valuable to us so we greatly appreciate anything you can do|We understand the volume of work you have so anything that you could do would be great and if there is anyone that can be spoken with we would be more than glad to further explain the details.}. <br/>
                      {Regards|Best Regards|Best Wishes|Sincerely},<br/>
                      $senderName
        ";
        return $this->process($template1);
    }
    
}

?>
