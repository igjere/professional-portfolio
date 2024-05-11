/**
 * FamilyMember is a Java class containing a model information for program.
 * 
 * @author Jeremiah Garcia (lnm248)
 * UTSA CS 3443 - Lab 5
 * Fall 2022
 */

package application.model;

/* Following class is for elaborating and printing further information on family members in the address book */

public class FamilyMember extends Contact {
	
	private String relationship;
	private String location;
	
	/* Constructor for this class */
	public FamilyMember(String name, String phoneNumber, String relationship, String location) {
		super(name, phoneNumber);
		this.relationship = relationship;
		this.location = location;
	}

	
	public void setRelationship(String relationship) {
		this.relationship = relationship;
	}	
	public String getRelationship() {
		return relationship;
	}
	
	/* Setters & getters for this variable */
	public void setLocation(String location) {
		this.location = location;
	}	
	public String getLocation() {
		return location;
	}
	
	/* toString method for this class */
	@Override
	public String toString() {
		return getName() + getRelationship() + getLocation() + getPhoneNumber();
	}

}
