/**
 * WorkContact is a Java class containing a model information for program.
 * 
 * @author Jeremiah Garcia (lnm248)
 * UTSA CS 3443 - Lab 5
 * Fall 2022
 */

package application.model;

/* Following class is for elaborating and printing further information on work contacts in the address book */

public class WorkContact extends Contact {
	
	private String title;
	
	/* Constructor for this class */
	public WorkContact (String name, String phoneNumber, String title) {
		super(name, phoneNumber);
		this.title = title;
	}

	/* Setters & getters for this variable */
	public void setTitle(String title) {
		this.title = title;
	}	
	public String getTitle() {
		return title;
	}
	
	/* toString method for this class */
	@Override
	public String toString() {
		return getName() + getTitle() + getPhoneNumber();
	}

}
