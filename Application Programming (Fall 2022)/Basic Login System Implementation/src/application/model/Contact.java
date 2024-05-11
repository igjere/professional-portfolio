/**
 * Contact is a Java class containing a model information for program.
 * 
 * @author Jeremiah Garcia (lnm248)
 * UTSA CS 3443 - Lab 5
 * Fall 2022
 */

package application.model;


/* Abstract class that will take name and phone number for passing onto FamilyMember or WorkContact classes */


public abstract class Contact {
	private String name;
	private String phoneNumber;
	private String firstName;
	private String lastName;
	
	/* Constructor for this class */
	public Contact(String name, String phoneNumber) {
		this.name = name;
		this.phoneNumber = phoneNumber;
		
		//Used for extra credit contact last name sorting
		String[] items = name.split(" ");
		if(items.length > 1) {
			this.firstName = items[0];
			this.lastName = items[1];
		}
	}

	/* Setters & getters for this variable */
	public void setName(String name) {
		this.name = name;
	}	
	public String getName() {
		return name;
	}
	
	/* Setters & getters for this variable */
	public void setPhoneNumber(String phoneNumber) {
		this.phoneNumber = phoneNumber;
	}	
	public String getPhoneNumber() {
		return phoneNumber;
	}
	
	/* Setters & getters for this variable */
	public void setFirstName(String firstName) {
		this.firstName = firstName;
	}	
	public String getFirstName() {
		return firstName;
	}
	
	/* Setters & getters for this variable */
	public void setLastName(String lastName) {
		this.lastName = lastName;
	}	
	public String getLastName() {
		return lastName;
	}
	
}