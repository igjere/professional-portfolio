using System.Collections;
using System.Collections.Generic;
// using UnityEngine;
using UnityEngine;
using UnityEngine.UI;

public class locustMove : MonoBehaviour
{
    public LevelManager levelMan;
    public float jumpForce = 8f; // Vertical force for the jump
    public float sideForce = 2f; // Horizontal force for side movement
    private Rigidbody2D rb;
    private Vector2 initialPosition;

    public AudioSource SoundPlayer;
    bool MouseOn = false;

    public AudioSource KillSound;

    void Start()
    {
        rb = GetComponent<Rigidbody2D>();
        initialPosition = transform.position;
        StartCoroutine(JumpRoutine());
    }

    IEnumerator JumpRoutine()
    {
        while (true)
        {
            yield return new WaitForSeconds(1.5f); // Time between jumps
            Jump();
        }
    }

    private void Jump()
    {
        // Randomly decide to jump right or left
        bool jumpRight = Random.Range(0, 2) == 0; // Generates 0 or 1, equals true if 0
        float horizontalJump = jumpRight ? sideForce : -sideForce;

        // Apply both vertical and horizontal forces
        rb.velocity = new Vector2(horizontalJump, jumpForce);

        // Flip sprite based on jump direction
        FlipSprite(jumpRight);
    }

    private void FlipSprite(bool facingRight)
    {
        // Ensure only the x scale is affected when flipping
        transform.localScale = new Vector3(facingRight ? Mathf.Abs(transform.localScale.x) : -Mathf.Abs(transform.localScale.x), 
                                           transform.localScale.y, 
                                           transform.localScale.z);
    }

    void Update()
    {
        // Reset position to initial Y if it falls below
        if (transform.position.y < initialPosition.y)
        {
            transform.position = new Vector2(transform.position.x, initialPosition.y);
            rb.velocity = new Vector2(0, 0); // Stop any further movement to stabilize on landing
        }
    }

    private void OnMouseOver()
    {
        if (MouseOn == false)
        {
            if (MainScript.ScreenReaderEnabled == true)
                SoundPlayer.Play();
            MouseOn = true;
        }
        Debug.Log(MouseOn);
    }

    private void OnMouseExit()
    {
        MouseOn = false;
        Debug.Log(MouseOn);
    }

    private void OnMouseDown()
    {
        StartCoroutine(KillBug());
    }

    private IEnumerator KillBug()
    {
        KillSound.Play();
        yield return new WaitForSeconds(0.3F);
        // Logic for when the ant is clicked
        levelMan. RoachClicked();
        gameObject.SetActive(false);
        Destroy(this.gameObject);
    }
}
