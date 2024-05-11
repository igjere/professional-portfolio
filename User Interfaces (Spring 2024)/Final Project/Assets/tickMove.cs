using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;

public class tickMove : MonoBehaviour
{
    public LevelManager levelMan;
    public float jumpForce = 10f;
    public float sideForce = 3f;
    private Rigidbody2D rb;
    private Vector2 initialPosition;

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
            yield return new WaitForSeconds(1.2f);
            Jump();
        }
    }

    private void Jump()
    {
        bool jumpRight = Random.Range(0, 2) == 0;
        float horizontalJump = jumpRight ? sideForce : -sideForce;
        rb.velocity = new Vector2(horizontalJump, jumpForce);
        RotateSprite(jumpRight);
    }

    private void RotateSprite(bool facingRight)
    {
        if (facingRight)
        {
            transform.rotation = Quaternion.Euler(0, 0, -45); 
        }
        else
        {
            transform.rotation = Quaternion.Euler(0, 0, 225); 
        }
    }

    void Update()
    {
        if (transform.position.y < initialPosition.y - 3)
        {
            rb.velocity = Vector2.zero;
            transform.position = new Vector2(transform.position.x, initialPosition.y);
        }
    }

    private void OnMouseDown()
    {
        levelMan.TickClicked();
        Destroy(gameObject);
    }
}
